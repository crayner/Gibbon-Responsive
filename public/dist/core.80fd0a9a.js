(window.webpackJsonp=window.webpackJsonp||[]).push([[3],{"/OfD":function(c,l,h){"use strict";h.r(l);var v=h("q1tI"),z=h.n(v),e=h("i8i4"),s=(h("IbaP"),h("I+W7"),h("JkIo"),h("17x9")),m=h.n(s),a="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(c){return typeof c}:function(c){return c&&"function"==typeof Symbol&&c.constructor===Symbol&&c!==Symbol.prototype?"symbol":typeof c},t=function(c,l){if(!(c instanceof l))throw new TypeError("Cannot call a class as a function")},r=function(){function c(c,l){for(var h=0;h<l.length;h++){var v=l[h];v.enumerable=v.enumerable||!1,v.configurable=!0,"value"in v&&(v.writable=!0),Object.defineProperty(c,v.key,v)}}return function(l,h,v){return h&&c(l.prototype,h),v&&c(l,v),l}}(),M=function(c,l){if(!c)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!l||"object"!=typeof l&&"function"!=typeof l?c:l},f="object"===("undefined"==typeof window?"undefined":"undefined"==typeof window?"undefined":a(window)),n=f?document:{},i=function(c){function l(c){t(this,l);var h=M(this,(l.__proto__||Object.getPrototypeOf(l)).call(this,c));if(h.state={idle:!1,oldDate:+new Date,lastActive:+new Date,remaining:null,pageX:null,pageY:null},h.tId=null,h._handleEvent=function(c){var l=h.state,v=l.remaining,z=l.pageX,e=l.pageY,s=l.idle,m=h.props,a=m.timeout,t=m.onAction,r=m.debounce,M=m.throttle,f=m.stopOnIdle;if(!v){if("mousemove"===c.type){if(c.pageX===z&&c.pageY===e)return;if(void 0===c.pageX&&void 0===c.pageY)return;if(h.getElapsedTime()<200)return}r>0?h.debouncedAction(c):M>0?h.throttledAction(c):t(c),clearTimeout(h.tId),h.tId=null,s&&!f&&h.toggleIdleState(c),h.setState({lastActive:+new Date,pageX:c.pageX,pageY:c.pageY}),s&&f||(h.tId=setTimeout(h.toggleIdleState,a))}},c.debounce>0&&c.throttle>0)throw new Error("onAction can either be throttled or debounced (not both)");return c.debounce>0&&(h.debouncedAction=function(c,l){var h=void 0;return function(){for(var v=arguments.length,z=Array(v),e=0;e<v;e++)z[e]=arguments[e];h&&clearTimeout(h),h=setTimeout(function(){c.apply(void 0,z),h=null},l)}}(c.onAction,c.debounce)),c.throttle>0&&(h.throttledAction=function(c,l){var h=0;return function(){var v=(new Date).getTime();if(!(v-h<l))return h=v,c.apply(void 0,arguments)}}(c.onAction,c.throttle)),c.startOnMount||(h.state.idle=!0),h.toggleIdleState=h._toggleIdleState.bind(h),h.reset=h._reset.bind(h),h.pause=h._pause.bind(h),h.resume=h._resume.bind(h),h.getRemainingTime=h._getRemainingTime.bind(h),h.getElapsedTime=h._getElapsedTime.bind(h),h.getLastActiveTime=h._getLastActiveTime.bind(h),h.isIdle=h._isIdle.bind(h),h}return function(c,l){if("function"!=typeof l&&null!==l)throw new TypeError("Super expression must either be null or a function, not "+typeof l);c.prototype=Object.create(l&&l.prototype,{constructor:{value:c,enumerable:!1,writable:!0,configurable:!0}}),l&&(Object.setPrototypeOf?Object.setPrototypeOf(c,l):c.__proto__=l)}(l,v.Component),r(l,[{key:"componentWillMount",value:function(){var c=this;if(f){var l=this.props,h=l.element,v=l.events,z=l.passive,e=l.capture;v.forEach(function(l){h.addEventListener(l,c._handleEvent,{capture:e,passive:z})})}}},{key:"componentDidMount",value:function(){this.props.startOnMount&&this.reset()}},{key:"componentWillUnmount",value:function(){var c=this;if(clearTimeout(this.tId),f){var l=this.props,h=l.element,v=l.events,z=l.passive,e=l.capture;v.forEach(function(l){h.removeEventListener(l,c._handleEvent,{capture:e,passive:z})})}}},{key:"render",value:function(){return this.props.children||null}},{key:"_toggleIdleState",value:function(c){var l=this.state.idle;this.setState({idle:!l});var h=this.props,v=h.onActive,z=h.onIdle,e=h.stopOnIdle;l?e||v(c):z(c)}},{key:"_reset",value:function(){clearTimeout(this.tId),this.tId=null,this.setState({idle:!1,oldDate:+new Date,lastActive:this.state.oldDate,remaining:null});var c=this.props.timeout;this.tId=setTimeout(this.toggleIdleState,c)}},{key:"_pause",value:function(){null===this.state.remaining&&(clearTimeout(this.tId),this.tId=null,this.setState({remaining:this.getRemainingTime()}))}},{key:"_resume",value:function(){var c=this.state,l=c.remaining,h=c.idle;null!==l&&(h||(this.setState({remaining:null}),this.tId=setTimeout(this.toggleIdleState,l)))}},{key:"_getRemainingTime",value:function(){var c=this.state,l=c.remaining,h=c.idle,v=c.lastActive;if(h)return 0;if(null!==l)return l;var z=this.props.timeout-(+new Date-v);return z<0&&(z=0),z}},{key:"_getElapsedTime",value:function(){var c=this.state.oldDate;return+new Date-c}},{key:"_getLastActiveTime",value:function(){return this.state.lastActive}},{key:"_isIdle",value:function(){return this.state.idle}}]),l}();i.propTypes={timeout:m.a.number,events:m.a.arrayOf(m.a.string),onIdle:m.a.func,onActive:m.a.func,onAction:m.a.func,debounce:m.a.number,throttle:m.a.number,element:m.a.oneOfType([m.a.object,m.a.element]),startOnMount:m.a.bool,stopOnIdle:m.a.bool,passive:m.a.bool,capture:m.a.bool},i.defaultProps={timeout:12e5,element:n,events:["mousemove","keydown","wheel","DOMMouseScroll","mouseWheel","mousedown","touchstart","touchmove","MSPointerDown","MSPointerMove"],onIdle:function(){},onActive:function(){},onAction:function(){},debounce:0,throttle:0,startOnMount:!0,stopOnIdle:!1,capture:!0,passive:!0};var o=i,H=h("Hqpm"),V=h("zHh7");function C(c){return(C="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(c){return typeof c}:function(c){return c&&"function"==typeof Symbol&&c.constructor===Symbol&&c!==Symbol.prototype?"symbol":typeof c})(c)}function L(c,l){for(var h=0;h<l.length;h++){var v=l[h];v.enumerable=v.enumerable||!1,v.configurable=!0,"value"in v&&(v.writable=!0),Object.defineProperty(c,v.key,v)}}function u(c){return(u=Object.setPrototypeOf?Object.getPrototypeOf:function(c){return c.__proto__||Object.getPrototypeOf(c)})(c)}function d(c,l){return(d=Object.setPrototypeOf||function(c,l){return c.__proto__=l,c})(c,l)}function p(c){if(void 0===c)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return c}var b=function(c){function l(c){var h,v,z;return function(c,l){if(!(c instanceof l))throw new TypeError("Cannot call a class as a function")}(this,l),v=this,(h=!(z=u(l).call(this,c))||"object"!==C(z)&&"function"!=typeof z?p(v):z).idleTimer=null,h.translations=c.translations,h.locale=c.locale,h.state={timeout:1e3*c.timeOut,remaining:null,lastActive:null,elapsed:null,display:!1},h.onActive=h._onActive.bind(p(p(h))),h.onIdle=h._onIdle.bind(p(p(h))),h.reset=h._reset.bind(p(p(h))),h.changeTimeout=h._changeTimeout.bind(p(p(h))),h.enableTimeout="string"!=typeof c.enableTimeout,h}var h,e,s;return function(c,l){if("function"!=typeof l&&null!==l)throw new TypeError("Super expression must either be null or a function");c.prototype=Object.create(l&&l.prototype,{constructor:{value:c,writable:!0,configurable:!0}}),l&&d(c,l)}(l,v["Component"]),h=l,(e=[{key:"componentDidMount",value:function(){var c=this;null!==this.idleTimer&&(this.setState({remaining:this.idleTimer.getRemainingTime(),lastActive:this.idleTimer.getLastActiveTime(),elapsed:this.idleTimer.getElapsedTime()}),setInterval(function(){c.setState({remaining:c.idleTimer.getRemainingTime(),lastActive:c.idleTimer.getLastActiveTime(),elapsed:c.idleTimer.getElapsedTime(),display:!(c.state.timeout-c.idleTimer.getElapsedTime()>3e4)}),c.wasLastActive!==c.idleTimer.getLastActiveTime()&&c.refreshPage(),c.wasLastActive=c.idleTimer.getLastActiveTime(),c.state.elapsed>c.state.timeout&&c.logout()},1e3))}},{key:"render",value:function(){var c=this;return z.a.createElement("div",null,this.enableTimeout?z.a.createElement(o,{ref:function(l){c.idleTimer=l},onActive:this.onActive,onIdle:this.onIdle,timeout:this.state.timeout,throttle:50,startOnLoad:!0}):"",this.state.display?z.a.createElement("div",{style:{position:"absolute",width:"100%",top:0,left:0,height:"100%",background:"lightblue url('/build/static/rosella.jpg') no-repeat fixed center",zIndex:99999}},z.a.createElement("div",{style:{position:"relative",width:"100%",top:0,left:0,height:"100%"}},z.a.createElement("div",{className:"text-center align-self-center container",style:{background:"peachpuff",maxWidth:"325px",position:"absolute",top:"50%",left:"50%",transform:"translate(-50%,-50%)",borderRadius:"5px"}},z.a.createElement("div",{className:"row",style:{padding:"2rem"}},z.a.createElement("div",{className:"col-12 alert alert-warning",style:{borderRadius:"5px"}},z.a.createElement("h3",null,"Gibbon-Mobile"),Object(V.a)(this.translations,"Your session is about to expire: you will be logged out shortly."))),z.a.createElement("div",{className:"row",style:{paddingBottom:"2rem"}},z.a.createElement("div",{className:"col-12 text-center"},z.a.createElement("button",{className:"btn btn-success",onClick:function(){return c.reset}},Object(V.a)(this.translations,"Stay Connected")),"  "))))):"")}},{key:"refreshPage",value:function(){this.state.elapsed>this.state.timeout&&Object(H.a)("/logout/",{method:"GET"},this.locale),this.reset()}},{key:"_onActive",value:function(){this.refreshPage()}},{key:"_onIdle",value:function(){}},{key:"_changeTimeout",value:function(){this.setState({timeout:this.refs.timeoutInput.state.value()})}},{key:"_reset",value:function(){this.idleTimer.reset()}},{key:"logout",value:function(){Object(H.a)("/logout/",{method:"GET"},this.locale)}}])&&L(h.prototype,e),s&&L(h,s),l}();Object(e.render)(z.a.createElement(b,window.CORE_PROPS),document.getElementById("coreRender"))},Hqpm:function(c,l,h){"use strict";function v(c,l,h){var v="_self";l&&"string"==typeof l.target&&(v=l.target);var z="";l&&"string"==typeof l.specs&&(z=l.specs),"boolean"==typeof h&&!1===h&&(h=""),null==h&&(h="en"),""!==h&&(h="/"+h),window.open(window.location.protocol+"//"+window.location.hostname+h+c,v,z)}h.d(l,"a",function(){return v})},"I+W7":function(c,l){
/*!
 * Font Awesome Free 5.5.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 */