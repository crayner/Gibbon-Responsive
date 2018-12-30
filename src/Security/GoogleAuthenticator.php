<?php
namespace App\Security;

use App\Entity\Person;
use App\Manager\MessageManager;
use App\Manager\SettingManager;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AuthenticatorInterface;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class GoogleAuthenticator implements AuthenticatorInterface
{
    use TargetPathTrait;

	/**
	 * @var EntityManagerInterface
	 */
	private $em;

	/**
	 * @var RouterInterface
	 */
	private $router;

	/**
	 * @var MessageManager
	 */
	private $messageManager;

	/**
	 * @var SettingManager
	 */
	private $settingManager;

	/**
	 * @var LoggerInterface
	 */
	private $logger;

	/**
	 * @var Object
	 */
	private $google_user;

    /**
     * GoogleAuthenticator constructor.
     * @param EntityManagerInterface $em
     * @param RouterInterface $router
     * @param MessageManager $messageManager
     * @param SettingManager $settingManager
     * @param LoggerInterface $logger
     */
	public function __construct(EntityManagerInterface $em, RouterInterface $router, MessageManager $messageManager, SettingManager $settingManager, LoggerInterface $logger)
	{
		$this->em = $em;
		$this->router = $router;
		$this->messageManager = $messageManager;
		$this->settingManager = $settingManager;
		$this->logger = $logger;
		$this->getClient();
	}

	public function getCredentials(Request $request)
	{
		$this->logger->debug("Google Authentication: Google authentication attempted.");

		return $this->fetchAccessToken($this->getGoogleClient());
	}

    /**
     * @param mixed $credentials
     * @param UserProviderInterface $userProvider
     * @return UserInterface
     */
    public function getUser($credentials, UserProviderInterface $userProvider): UserInterface
    {
        $user = $userProvider->getRepository(Person::class)->findOneBy(['googleAPIRefreshToken' => $this->google_user->getId()]);
        // 1) have they logged in with Google before? Easy!
        /*		$existingUser = $this->em->getRepository(Person::class)
                    ->findOneBy(['googleId' => $googleUser->getId()]);
                if ($existingUser) {
                    return $existingUser;
                }
        */
        if (empty($user)) {
            // 2) do we have a matching user by email?
            $user = $userProvider->loadUserByUsername($this->google_user->getEmail());

            $user->setGoogleAPIRefreshToken($this->google_user->getId());

            $this->em->persist($user);
            $this->em->flush();
        }

		// 3) Maybe you just want to "register" them by creating
		// a UserProvider object
//		$user->setGoogleId($googleUser->getId());
//		$this->em->persist($user);
//		$this->em->flush();
        $this->logger->debug(sprintf('Google Authentication: The user "%s" authenticated using Google.', $this->google_user->getName()));

        $this->getSettingManager()->getSession()->set('googleAPIAccessToken', $credentials);

		return $user;
	}

	private $token;

    /**
     * getGoogleClient
     * @return mixed
     * @throws \Google_Exception
     */
    private function getGoogleClient()
    {
        $this->token = $this->getClient()->fetchAccessTokenWithAuthCode($this->getSettingManager()->getRequest()->query->get('code'));// to get code
        $this->getClient()->setAccessToken($this->token); // to get access token by setting of $code
        $service = new \Google_Service_Oauth2($this->getClient());
        $this->google_user = $service->userinfo->get();   // to get user detail by using access token
        return $this->google_user;
    }

    /**
	 * @param Request                 $request
	 * @param AuthenticationException $exception
	 *
	 * @return null|RedirectResponse|\Symfony\Component\HttpFoundation\Response
	 */
	public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
	{
		$this->logger->notice("Google Authentication: ".  $exception->getMessage());

		return new RedirectResponse($this->router->generate($this->settingManager->getParameter('security.routes.security_user_login')));
	}

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @param string $providerKey
     * @return null|RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
	{
		$user = $token->getUser();
		$this->logger->notice("Google Authentication: UserProvider #" . $user->getId() . " (" . $user->getEmail() . ") The user authenticated via Google.");


		$user->setGoogleAPIRefreshToken($this->google_user->getId());

		$this->em->persist($user);
		$this->em->flush();

		if (null !== $user->getLocale())
			$request->setLocale($user->getLocale());

        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey))
            return new RedirectResponse($targetPath);
        return new RedirectResponse($this->getLoginUrl());
	}

    /**
     * @param Request $request
     * @param AuthenticationException|null $authException
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function start(Request $request, AuthenticationException $authException = null)
	{
		return new RedirectResponse($this->router->generate($this->settingManager->getParameter('security.routes.security_user_login')));
	}

	/**
	 * @param UserInterface $user
	 * @param string        $providerKey
	 *
	 * @return UsernamePasswordToken|\Symfony\Component\Security\Guard\Token\GuardTokenInterface
	 */
	public function createAuthenticatedToken(UserInterface $user, $providerKey)
	{
		return new UsernamePasswordToken(
			$user,
			$user->getPassword(),
			$providerKey,
			$user->getRoles()
		);
	}

	/**
	 * @param mixed         $credentials
	 * @param UserInterface $user
	 *
	 * @return bool
	 */
	public function checkCredentials($credentials, UserInterface $user)
	{
		return true;
	}

	/**
	 * @param Request $request
	 *
	 * @return bool
	 */
	public function supports(Request $request): bool
	{
		if ($request->getPathInfo() != '/security/oauth2callback/')
			return false;

		return true;
	}

    /**
     * fetchAccessToken
     * @return array
     * @throws \Google_Exception
     */
	protected function fetchAccessToken()
	{
	    return $this->getClient()->getAccessToken();
	}

	/**
	 * @return bool
	 */
	public function supportsRememberMe()
	{
		return false;
	}

    /**
     * getLoginUrl
     * @return string
     */
    protected function getLoginUrl()
    {
        return $this->router->generate('login');
    }

    /**
     * @return SettingManager
     */
    public function getSettingManager(): SettingManager
    {
        return $this->settingManager;
    }

    /**
     * @var array
     */
    private $clientSecrets = [];

    /**
     * getClientSecrets
     * @return array
     */
    public function getClientSecrets(): array
    {
        if (! empty($this->clientSecrets))
            return $this->clientSecrets;
        $clientSecrets = [];
        $clientSecrets['web']['client_id'] = $this->getSettingManager()->getSettingByScopeAsString('System', 'googleClientID');
        $clientSecrets['web']['project_id'] = $this->getSettingManager()->getSettingByScopeAsString('System', 'googleDeveloperKey');
        $clientSecrets['web']['auth_uri'] = 'https://accounts.google.com/o/oauth2/auth';
        $clientSecrets['web']['token_uri'] = 'https://www.googleapis.com/oauth2/v3/token';
        $clientSecrets['web']['auth_provider_x509_cert_url'] = 'https://www.googleapis.com/oauth2/v1/certs';
        $clientSecrets['web']['client_secret'] = $this->getSettingManager()->getSettingByScopeAsString('System', 'googleClientSecret');
        $clientSecrets['web']['redirect_uris'] = [$this->getSettingManager()->getSettingByScopeAsString('System', 'googleRedirectUri')];
        return $this->clientSecrets = $clientSecrets;
    }

    /**
     * getConfig
     * @return array
     * @throws \Exception
     */
    public function getConfig(): array {
        return [
            'application_name' => $this->getSettingManager()->getSettingByScopeAsString('System', 'googleClientName'),
            'access_type' => 'offline',
            'include_granted_scopes' => true,
        ];
    }

    /**
     * connect
     * @return string
     * @throws \Google_Exception
     */
    public function connectUrl(): string
    {
        return $this->getClient()->createAuthUrl();
    }

    /**
     * @var \Google_Client|null
     */
    private $client;

    /**
     * getClient
     * @return \Google_Client
     * @throws \Google_Exception
     */
    public function getClient(): \Google_Client
    {
        if (! empty($this->client))
            return $this->client;
        $client = new \Google_Client($this->getConfig());
        $client->setAuthConfig($this->getClientSecrets());
        $client->addScope(['https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me', 'https://www.googleapis.com/auth/calendar']);
        $client->setRedirectUri($this->getRouter()->generate('connect_google_check',[],UrlGeneratorInterface::ABSOLUTE_URL));
        return $this->client = $client;
    }

    /**
     * @return RouterInterface
     */
    public function getRouter(): RouterInterface
    {
        return $this->router;
    }
}
