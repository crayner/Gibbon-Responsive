(window.webpackJsonp=window.webpackJsonp||[]).push([[6],{"4nQW":function(t,e,n){"use strict";n.r(e);var o=n("q1tI"),r=n.n(o),a=n("i8i4"),i=n("17x9"),s=n.n(i),c=n("IP2g"),l=n("twK/"),u=n("zHh7");function f(t,e){if(null==t)return{};var n,o,r=function(t,e){if(null==t)return{};var n,o,r={},a=Object.keys(t);for(o=0;o<a.length;o++)n=a[o],e.indexOf(n)>=0||(r[n]=t[n]);return r}(t,e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);for(o=0;o<a.length;o++)n=a[o],e.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(t,n)&&(r[n]=t[n])}return r}function p(t){var e=t.messageCount,n=t.translations,o=(f(t,["messageCount","translations"]),e),a=0===o?"grey":"tomato",i=o.toString().length,s=i>1?35-4*i:28;return r.a.createElement("span",{className:"fa-layers fa-fw",style:{marginRight:"10px",minHeight:"50px"},title:Object(u.a)(n,"Message Wall")},r.a.createElement(c.a,{className:0===o?"text-muted":"text-tomato",icon:l.a,transform:"down-3 left-2"}),r.a.createElement(c.a,{className:0===o?"text-muted":"text-tomato",icon:l.a,transform:"rotate-180 up-3 right-2"}),r.a.createElement("span",{className:"fa-layers-counter",style:{background:a,margin:"28px "+s+"px 0 0"}},o))}function m(t,e){if(null==t)return{};var n,o,r=function(t,e){if(null==t)return{};var n,o,r={},a=Object.keys(t);for(o=0;o<a.length;o++)n=a[o],e.indexOf(n)>=0||(r[n]=t[n]);return r}(t,e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);for(o=0;o<a.length;o++)n=a[o],e.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(t,n)&&(r[n]=t[n])}return r}function y(t){var e=t.likeCount,n=t.translations,o=(m(t,["likeCount","translations"]),e),a=0===o?"grey":"tomato",i=o.toString().length,s=i>1?35-4*i:28;return r.a.createElement("span",{className:"fa-layers fa-fw",style:{marginRight:"10px",minHeight:"50px"},title:Object(u.a)(n,"Likes")},r.a.createElement(c.a,{className:0===o?"text-muted":"text-tomato",icon:l.b}),r.a.createElement("span",{className:"fa-layers-counter",style:{background:a,margin:"28px "+s+"px 0 0"}},o))}function h(t,e){if(null==t)return{};var n,o,r=function(t,e){if(null==t)return{};var n,o,r={},a=Object.keys(t);for(o=0;o<a.length;o++)n=a[o],e.indexOf(n)>=0||(r[n]=t[n]);return r}(t,e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);for(o=0;o<a.length;o++)n=a[o],e.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(t,n)&&(r[n]=t[n])}return r}function b(t){var e=t.notificationCount,n=t.translations,o=t.showNotifications,a=(h(t,["notificationCount","translations","showNotifications"]),e),i=0===a?"grey":"tomato",s=a.toString().length,f=s>1?29-4*s:22;return r.a.createElement("span",{className:"fa-layers fa-fw",style:{marginRight:"10px",minHeight:"50px"},title:Object(u.a)(n,"Notifications"),onClick:function(){return o()}},r.a.createElement(c.a,{className:0===a?"text-muted":"text-black",icon:l.c}),r.a.createElement("span",{className:"fa-layers-counter",style:{background:i,margin:"26px "+f+"px 0 0"}},a))}p.defaultProps={messageCount:0},y.defaultProps={likeCount:0},b.defaultProps={notificationCount:0};var d=n("dWkn"),g=n("Hqpm");function w(t){return(w="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}function O(){return(O=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(t[o]=n[o])}return t}).apply(this,arguments)}function v(t,e){for(var n=0;n<e.length;n++){var o=e[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(t,o.key,o)}}function x(t){return(x=Object.setPrototypeOf?Object.getPrototypeOf:function(t){return t.__proto__||Object.getPrototypeOf(t)})(t)}function j(t,e){return(j=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t})(t,e)}function E(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}var k=function(t){function e(t){var n,o,r;return function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,e),o=this,(n=!(r=x(e).call(this,t))||"object"!==w(r)&&"function"!=typeof r?E(o):r).displayTray=t.displayTray,n.locale=t.locale,n.isStaff=t.isStaff,n.otherProps=O({},t),n.state={messageCount:0,likeCount:0,notificationCount:0},n.timeout=!0===n.isStaff?1e4:12e4,n.showNotifications=n.showNotifications.bind(E(E(n))),n}var n,a,i;return function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),e&&j(t,e)}(e,o["Component"]),n=e,(a=[{key:"componentDidMount",value:function(){this.displayTray&&this.loadNotification(250+2e3*Math.random())}},{key:"componentWillUnmount",value:function(){clearTimeout(this.notificationTime)}},{key:"loadNotification",value:function(t){var e=this;this.notificationTime=setTimeout(function(){Object(d.a)("/notification/details/",{method:"GET"},e.locale).then(function(t){t.count!==e.state.notiificationCount&&e.setState({notificationCount:t.count})}),e.loadNotification(e.timeout)},t)}},{key:"showNotifications",value:function(){this.state.notificationCount>0&&Object(g.a)("/notification/show/",{method:"GET"},this.locale)}},{key:"render",value:function(){return this.displayTray?r.a.createElement("div",{className:"text-right"},r.a.createElement(b,O({notificationCount:this.state.notificationCount},this.otherProps,{showNotifications:this.showNotifications})),r.a.createElement(y,O({likeCount:this.state.likeCount},this.otherProps)),r.a.createElement(p,O({messageCount:this.state.messageCount},this.otherProps))):r.a.createElement("div",null)}}])&&v(n.prototype,a),i&&v(n,i),e}();b.propTypes={displayTray:s.a.bool,isStaff:s.a.bool.isRequired,locale:s.a.string},b.defaultProps={displayTray:!1,locale:"en_GB"},Object(a.render)(r.a.createElement(k,window.TRAY_PROPS),document.getElementById("notificationTray"))},Hqpm:function(t,e,n){"use strict";function o(t,e,n){var o="_self";e&&"string"==typeof e.target&&(o=e.target);var r="";e&&"string"==typeof e.specs&&(r=e.specs),"boolean"==typeof n&&!1===n&&(n=""),null==n&&(n="en"),""!==n&&(n="/"+n),window.open(window.location.protocol+"//"+window.location.hostname+n+t,o,r)}n.d(e,"a",function(){return o})},dWkn:function(t,e,n){"use strict";function o(){return(o=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(t[o]=n[o])}return t}).apply(this,arguments)}function r(t,e,n){var r={};e&&e.headers&&(r=e.headers,delete e.headers),r=o({},r,{"Content-Type":"application/json; charset=utf-8"}),null===n&&(n="en"),!1!==n&&""!==t||(n="");var i=window.location.protocol+"//"+window.location.hostname+"/";return fetch(i+n+t,o({},e,{credentials:"same-origin",headers:r})).then(a).then(function(t){return t.text().then(function(t){return t?JSON.parse(t):""})})}function a(t){if(t.status>=200&&t.status<400)return t;var e=new Error(t.statusText);throw e.response=t,e}n.d(e,"a",function(){return r})},zHh7:function(t,e,n){"use strict";function o(t,e){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};if(e in t){var o=t[e];for(var r in n)o=o.replace(r,n[r]+"");return o}return e}n.d(e,"a",function(){return o})}},[["4nQW",0,1,2]]]);