(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[307],{26033:function(e,t,n){var r=0/0,i=/^\s+|\s+$/g,o=/^[-+]0x[0-9a-f]+$/i,u=/^0b[01]+$/i,c=/^0o[0-7]+$/i,l=parseInt,a="object"==typeof n.g&&n.g&&n.g.Object===Object&&n.g,f="object"==typeof self&&self&&self.Object===Object&&self,s=a||f||Function("return this")(),d=Object.prototype.toString,w=Math.max,g=Math.min,v=function(){return s.Date.now()};function h(e){var t=typeof e;return!!e&&("object"==t||"function"==t)}function y(e){if("number"==typeof e)return e;if("symbol"==typeof(t=e)||t&&"object"==typeof t&&"[object Symbol]"==d.call(t))return r;if(h(e)){var t,n="function"==typeof e.valueOf?e.valueOf():e;e=h(n)?n+"":n}if("string"!=typeof e)return 0===e?e:+e;e=e.replace(i,"");var a=u.test(e);return a||c.test(e)?l(e.slice(2),a?2:8):o.test(e)?r:+e}e.exports=function(e,t,n){var r,i,o,u,c,l,a=0,f=!1,s=!1,d=!0;if("function"!=typeof e)throw TypeError("Expected a function");function p(t){var n=r,o=i;return r=i=void 0,a=t,u=e.apply(o,n)}function b(e){var n=e-l,r=e-a;return void 0===l||n>=t||n<0||s&&r>=o}function m(){var e,n,r,i=v();if(b(i))return E(i);c=setTimeout(m,(e=i-l,n=i-a,r=t-e,s?g(r,o-n):r))}function E(e){return(c=void 0,d&&r)?p(e):(r=i=void 0,u)}function S(){var e,n=v(),o=b(n);if(r=arguments,i=this,l=n,o){if(void 0===c)return a=e=l,c=setTimeout(m,t),f?p(e):u;if(s)return c=setTimeout(m,t),p(l)}return void 0===c&&(c=setTimeout(m,t)),u}return t=y(t)||0,h(n)&&(f=!!n.leading,o=(s="maxWait"in n)?w(y(n.maxWait)||0,t):o,d="trailing"in n?!!n.trailing:d),S.cancel=function(){void 0!==c&&clearTimeout(c),a=0,r=l=i=c=void 0},S.flush=function(){return void 0===c?u:E(v())},S}},30307:function(e,t,n){"use strict";n.d(t,{Pr:function(){return d},_:function(){return a},iP:function(){return g},tm:function(){return f}});var r=n(2265),i=n(26033),o="undefined"!=typeof window?r.useLayoutEffect:r.useEffect;function u(e,t,n,i){let u=(0,r.useRef)(t);o(()=>{u.current=t},[t]),(0,r.useEffect)(()=>{let t=(null==n?void 0:n.current)??window;if(!(t&&t.addEventListener))return;let r=e=>{u.current(e)};return t.addEventListener(e,r,i),()=>{t.removeEventListener(e,r,i)}},[e,n,i])}function c(e){let t=(0,r.useRef)(()=>{throw Error("Cannot call an event handler while rendering.")});return o(()=>{t.current=e},[e]),(0,r.useCallback)((...e)=>{var n;return null==(n=t.current)?void 0:n.call(t,...e)},[t])}var l="undefined"==typeof window;function a(e,t,n={}){let{initializeWithValue:i=!0}=n,o=(0,r.useCallback)(e=>n.serializer?n.serializer(e):JSON.stringify(e),[n]),a=(0,r.useCallback)(e=>{let r;if(n.deserializer)return n.deserializer(e);if("undefined"===e)return;let i=t instanceof Function?t():t;try{r=JSON.parse(e)}catch(e){return console.error("Error parsing JSON:",e),i}return r},[n,t]),f=(0,r.useCallback)(()=>{let n=t instanceof Function?t():t;if(l)return n;try{let t=window.localStorage.getItem(e);return t?a(t):n}catch(t){return console.warn(`Error reading localStorage key \u201C${e}\u201D:`,t),n}},[t,e,a]),[s,d]=(0,r.useState)(()=>i?f():t instanceof Function?t():t),w=c(t=>{l&&console.warn(`Tried setting localStorage key \u201C${e}\u201D even though environment is not a client`);try{let n=t instanceof Function?t(f()):t;window.localStorage.setItem(e,o(n)),d(n),window.dispatchEvent(new StorageEvent("local-storage",{key:e}))}catch(t){console.warn(`Error setting localStorage key \u201C${e}\u201D:`,t)}}),g=c(()=>{l&&console.warn(`Tried removing localStorage key \u201C${e}\u201D even though environment is not a client`);let n=t instanceof Function?t():t;window.localStorage.removeItem(e),d(n),window.dispatchEvent(new StorageEvent("local-storage",{key:e}))});(0,r.useEffect)(()=>{d(f())},[e]);let v=(0,r.useCallback)(t=>{t.key&&t.key!==e||d(f())},[e,f]);return u("storage",v),u("local-storage",v),[s,w,g]}function f(){let e=(0,r.useRef)(!1);return(0,r.useEffect)(()=>(e.current=!0,()=>{e.current=!1}),[]),(0,r.useCallback)(()=>e.current,[])}var s="undefined"==typeof window;function d(e={}){let{autoLock:t=!0,lockTarget:n,widthReflow:i=!0}=e,[u,c]=(0,r.useState)(!1),l=(0,r.useRef)(null),a=(0,r.useRef)(null),f=()=>{if(l.current){let{overflow:e,paddingRight:t}=l.current.style;if(a.current={overflow:e,paddingRight:t},i){let e=l.current===document.body?window.innerWidth:l.current.offsetWidth,t=parseInt(window.getComputedStyle(l.current).paddingRight,10)||0,n=e-l.current.scrollWidth;l.current.style.paddingRight=`${n+t}px`}l.current.style.overflow="hidden",c(!0)}},d=()=>{l.current&&a.current&&(l.current.style.overflow=a.current.overflow,i&&(l.current.style.paddingRight=a.current.paddingRight)),c(!1)};return o(()=>{if(!s)return n&&(l.current="string"==typeof n?document.querySelector(n):n),l.current||(l.current=document.body),t&&f(),()=>{d()}},[t,n,i]),{isLocked:u,lock:f,unlock:d}}var w="undefined"==typeof window;function g(e={}){let{initializeWithValue:t=!0}=e;w&&(t=!1);let[n,c]=(0,r.useState)(()=>t?{width:window.innerWidth,height:window.innerHeight}:{width:void 0,height:void 0}),l=function(e,t=500,n){let o=(0,r.useRef)();!function(e){let t=(0,r.useRef)(e);t.current=e,(0,r.useEffect)(()=>()=>{t.current()},[])}(()=>{o.current&&o.current.cancel()});let u=(0,r.useMemo)(()=>{let r=i(e,t,n),u=(...e)=>r(...e);return u.cancel=()=>{r.cancel()},u.isPending=()=>!!o.current,u.flush=()=>r.flush(),u},[e,t,n]);return(0,r.useEffect)(()=>{o.current=i(e,t,n)},[e,t,n]),u}(c,e.debounceDelay);function a(){(e.debounceDelay?l:c)({width:window.innerWidth,height:window.innerHeight})}return u("resize",a),o(()=>{a()},[]),n}}}]);