(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[1048,532,2203],{94537:function(e,t,n){Promise.resolve().then(n.bind(n,77164)),Promise.resolve().then(n.bind(n,15574)),Promise.resolve().then(n.bind(n,22960)),Promise.resolve().then(n.bind(n,47082)),Promise.resolve().then(n.bind(n,39098)),Promise.resolve().then(n.bind(n,62696)),Promise.resolve().then(n.bind(n,69939)),Promise.resolve().then(n.bind(n,20568)),Promise.resolve().then(n.bind(n,53182)),Promise.resolve().then(n.bind(n,66906)),Promise.resolve().then(n.bind(n,73667)),Promise.resolve().then(n.bind(n,83158)),Promise.resolve().then(n.bind(n,34239)),Promise.resolve().then(n.bind(n,96902)),Promise.resolve().then(n.t.bind(n,81749,23)),Promise.resolve().then(n.bind(n,44683)),Promise.resolve().then(n.bind(n,46848))},65939:function(e){var t,n,s,i,l,r,o,a,u,d,c,m,h;e.exports=(s=/\[([^\]]+)]|Y{1,4}|M{1,4}|D{1,2}|d{1,4}|H{1,2}|h{1,2}|a|A|m{1,2}|s{1,2}|Z{1,2}|SSS/g,i=/^(-|\+)?P(?:([-+]?[0-9,.]*)Y)?(?:([-+]?[0-9,.]*)M)?(?:([-+]?[0-9,.]*)W)?(?:([-+]?[0-9,.]*)D)?(?:T(?:([-+]?[0-9,.]*)H)?(?:([-+]?[0-9,.]*)M)?(?:([-+]?[0-9,.]*)S)?)?$/,l={years:31536e6,months:2628e6,days:864e5,hours:36e5,minutes:6e4,seconds:1e3,milliseconds:1,weeks:6048e5},r=function(e){return e instanceof m},o=function(e,t,n){return new m(e,n,t.$l)},a=function(e){return n.p(e)+"s"},u=function(e){return e<0},d=function(e){return u(e)?Math.ceil(e):Math.floor(e)},c=function(e,t){return e?u(e)?{negative:!0,format:""+Math.abs(e)+t}:{negative:!1,format:""+e+t}:{negative:!1,format:""}},m=function(){function e(e,t,n){var s=this;if(this.$d={},this.$l=n,void 0===e&&(this.$ms=0,this.parseFromMilliseconds()),t)return o(e*l[a(t)],this);if("number"==typeof e)return this.$ms=e,this.parseFromMilliseconds(),this;if("object"==typeof e)return Object.keys(e).forEach(function(t){s.$d[a(t)]=e[t]}),this.calMilliseconds(),this;if("string"==typeof e){var r=e.match(i);if(r){var u=r.slice(2).map(function(e){return null!=e?Number(e):0});return this.$d.years=u[0],this.$d.months=u[1],this.$d.weeks=u[2],this.$d.days=u[3],this.$d.hours=u[4],this.$d.minutes=u[5],this.$d.seconds=u[6],this.calMilliseconds(),this}}return this}var u=e.prototype;return u.calMilliseconds=function(){var e=this;this.$ms=Object.keys(this.$d).reduce(function(t,n){return t+(e.$d[n]||0)*l[n]},0)},u.parseFromMilliseconds=function(){var e=this.$ms;this.$d.years=d(e/31536e6),e%=31536e6,this.$d.months=d(e/2628e6),e%=2628e6,this.$d.days=d(e/864e5),e%=864e5,this.$d.hours=d(e/36e5),e%=36e5,this.$d.minutes=d(e/6e4),e%=6e4,this.$d.seconds=d(e/1e3),e%=1e3,this.$d.milliseconds=e},u.toISOString=function(){var e=c(this.$d.years,"Y"),t=c(this.$d.months,"M"),n=+this.$d.days||0;this.$d.weeks&&(n+=7*this.$d.weeks);var s=c(n,"D"),i=c(this.$d.hours,"H"),l=c(this.$d.minutes,"M"),r=this.$d.seconds||0;this.$d.milliseconds&&(r+=this.$d.milliseconds/1e3,r=Math.round(1e3*r)/1e3);var o=c(r,"S"),a=e.negative||t.negative||s.negative||i.negative||l.negative||o.negative,u=i.format||l.format||o.format?"T":"",d=(a?"-":"")+"P"+e.format+t.format+s.format+u+i.format+l.format+o.format;return"P"===d||"-P"===d?"P0D":d},u.toJSON=function(){return this.toISOString()},u.format=function(e){var t={Y:this.$d.years,YY:n.s(this.$d.years,2,"0"),YYYY:n.s(this.$d.years,4,"0"),M:this.$d.months,MM:n.s(this.$d.months,2,"0"),D:this.$d.days,DD:n.s(this.$d.days,2,"0"),H:this.$d.hours,HH:n.s(this.$d.hours,2,"0"),m:this.$d.minutes,mm:n.s(this.$d.minutes,2,"0"),s:this.$d.seconds,ss:n.s(this.$d.seconds,2,"0"),SSS:n.s(this.$d.milliseconds,3,"0")};return(e||"YYYY-MM-DDTHH:mm:ss").replace(s,function(e,n){return n||String(t[e])})},u.as=function(e){return this.$ms/l[a(e)]},u.get=function(e){var t=this.$ms,n=a(e);return"milliseconds"===n?t%=1e3:t="weeks"===n?d(t/l[n]):this.$d[n],t||0},u.add=function(e,t,n){var s;return s=t?e*l[a(t)]:r(e)?e.$ms:o(e,this).$ms,o(this.$ms+s*(n?-1:1),this)},u.subtract=function(e,t){return this.add(e,t,!0)},u.locale=function(e){var t=this.clone();return t.$l=e,t},u.clone=function(){return o(this.$ms,this)},u.humanize=function(e){return t().add(this.$ms,"ms").locale(this.$l).fromNow(!e)},u.valueOf=function(){return this.asMilliseconds()},u.milliseconds=function(){return this.get("milliseconds")},u.asMilliseconds=function(){return this.as("milliseconds")},u.seconds=function(){return this.get("seconds")},u.asSeconds=function(){return this.as("seconds")},u.minutes=function(){return this.get("minutes")},u.asMinutes=function(){return this.as("minutes")},u.hours=function(){return this.get("hours")},u.asHours=function(){return this.as("hours")},u.days=function(){return this.get("days")},u.asDays=function(){return this.as("days")},u.weeks=function(){return this.get("weeks")},u.asWeeks=function(){return this.as("weeks")},u.months=function(){return this.get("months")},u.asMonths=function(){return this.as("months")},u.years=function(){return this.get("years")},u.asYears=function(){return this.as("years")},e}(),h=function(e,t,n){return e.add(t.years()*n,"y").add(t.months()*n,"M").add(t.days()*n,"d").add(t.hours()*n,"h").add(t.minutes()*n,"m").add(t.seconds()*n,"s").add(t.milliseconds()*n,"ms")},function(e,s,i){t=i,n=i().$utils(),i.duration=function(e,t){return o(e,{$l:i.locale()},t)},i.isDuration=r;var l=s.prototype.add,a=s.prototype.subtract;s.prototype.add=function(e,t){return r(e)?h(this,e,1):l.bind(this)(e,t)},s.prototype.subtract=function(e,t){return r(e)?h(this,e,-1):a.bind(this)(e,t)}})},65058:function(e){e.exports=function(e,t,n){e=e||{};var s=t.prototype,i={future:"in %s",past:"%s ago",s:"a few seconds",m:"a minute",mm:"%d minutes",h:"an hour",hh:"%d hours",d:"a day",dd:"%d days",M:"a month",MM:"%d months",y:"a year",yy:"%d years"};function l(e,t,n,i){return s.fromToBase(e,t,n,i)}n.en.relativeTime=i,s.fromToBase=function(t,s,l,r,o){for(var a,u,d,c=l.$locale().relativeTime||i,m=e.thresholds||[{l:"s",r:44,d:"second"},{l:"m",r:89},{l:"mm",r:44,d:"minute"},{l:"h",r:89},{l:"hh",r:21,d:"hour"},{l:"d",r:35},{l:"dd",r:25,d:"day"},{l:"M",r:45},{l:"MM",r:10,d:"month"},{l:"y",r:17},{l:"yy",d:"year"}],h=m.length,f=0;f<h;f+=1){var v=m[f];v.d&&(a=r?n(t).diff(l,v.d,!0):l.diff(t,v.d,!0));var p=(e.rounding||Math.round)(Math.abs(a));if(d=a>0,p<=v.r||!v.r){p<=1&&f>0&&(v=m[f-1]);var g=c[v.l];o&&(p=o(""+p)),u="string"==typeof g?g.replace("%d",p):g(p,s,v.l,d);break}}if(s)return u;var x=d?c.future:c.past;return"function"==typeof x?x(u):x.replace("%s",u)},s.to=function(e,t){return l(e,t,this,!0)},s.from=function(e,t){return l(e,t,this)};var r=function(e){return e.$u?n.utc():n()};s.toNow=function(e){return this.to(r(this),e)},s.fromNow=function(e){return this.from(r(this),e)}}},49586:function(e){var t,n;e.exports=(t={year:0,month:1,day:2,hour:3,minute:4,second:5},n={},function(e,s,i){var l,r=function(e,t,s){void 0===s&&(s={});var i,l,r,o,a=new Date(e);return(void 0===(i=s)&&(i={}),(o=n[r=t+"|"+(l=i.timeZoneName||"short")])||(o=new Intl.DateTimeFormat("en-US",{hour12:!1,timeZone:t,year:"numeric",month:"2-digit",day:"2-digit",hour:"2-digit",minute:"2-digit",second:"2-digit",timeZoneName:l}),n[r]=o),o).formatToParts(a)},o=function(e,n){for(var s=r(e,n),l=[],o=0;o<s.length;o+=1){var a=s[o],u=a.type,d=a.value,c=t[u];c>=0&&(l[c]=parseInt(d,10))}var m=l[3],h=l[0]+"-"+l[1]+"-"+l[2]+" "+(24===m?0:m)+":"+l[4]+":"+l[5]+":000",f=+e;return(i.utc(h).valueOf()-(f-=f%1e3))/6e4},a=s.prototype;a.tz=function(e,t){void 0===e&&(e=l);var n,s=this.utcOffset(),r=this.toDate(),o=r.toLocaleString("en-US",{timeZone:e}),a=Math.round((r-new Date(o))/1e3/60),u=-(15*Math.round(r.getTimezoneOffset()/15))-a;if(Number(u)){if(n=i(o,{locale:this.$L}).$set("millisecond",this.$ms).utcOffset(u,!0),t){var d=n.utcOffset();n=n.add(s-d,"minute")}}else n=this.utcOffset(0,t);return n.$x.$timezone=e,n},a.offsetName=function(e){var t=this.$x.$timezone||i.tz.guess(),n=r(this.valueOf(),t,{timeZoneName:e}).find(function(e){return"timezonename"===e.type.toLowerCase()});return n&&n.value};var u=a.startOf;a.startOf=function(e,t){if(!this.$x||!this.$x.$timezone)return u.call(this,e,t);var n=i(this.format("YYYY-MM-DD HH:mm:ss:SSS"),{locale:this.$L});return u.call(n,e,t).tz(this.$x.$timezone,!0)},i.tz=function(e,t,n){var s=n&&t,r=n||t||l,a=o(+i(),r);if("string"!=typeof e)return i(e).tz(r);var u=function(e,t,n){var s=e-60*t*1e3,i=o(s,n);if(t===i)return[s,t];var l=o(s-=60*(i-t)*1e3,n);return i===l?[s,i]:[e-60*Math.min(i,l)*1e3,Math.max(i,l)]}(i.utc(e,s).valueOf(),a,r),d=u[0],c=u[1],m=i(d).utcOffset(c);return m.$x.$timezone=r,m},i.tz.guess=function(){return Intl.DateTimeFormat().resolvedOptions().timeZone},i.tz.setDefault=function(e){l=e}})},42366:function(e){var t,n,s;e.exports=(t="minute",n=/[+-]\d\d(?::?\d\d)?/g,s=/([+-]|\d\d)/g,function(e,i,l){var r=i.prototype;l.utc=function(e){var t={date:e,utc:!0,args:arguments};return new i(t)},r.utc=function(e){var n=l(this.toDate(),{locale:this.$L,utc:!0});return e?n.add(this.utcOffset(),t):n},r.local=function(){return l(this.toDate(),{locale:this.$L,utc:!1})};var o=r.parse;r.parse=function(e){e.utc&&(this.$u=!0),this.$utils().u(e.$offset)||(this.$offset=e.$offset),o.call(this,e)};var a=r.init;r.init=function(){if(this.$u){var e=this.$d;this.$y=e.getUTCFullYear(),this.$M=e.getUTCMonth(),this.$D=e.getUTCDate(),this.$W=e.getUTCDay(),this.$H=e.getUTCHours(),this.$m=e.getUTCMinutes(),this.$s=e.getUTCSeconds(),this.$ms=e.getUTCMilliseconds()}else a.call(this)};var u=r.utcOffset;r.utcOffset=function(e,i){var l=this.$utils().u;if(l(e))return this.$u?0:l(this.$offset)?u.call(this):this.$offset;if("string"==typeof e&&null===(e=function(e){void 0===e&&(e="");var t=e.match(n);if(!t)return null;var i=(""+t[0]).match(s)||["-",0,0],l=i[0],r=60*+i[1]+ +i[2];return 0===r?0:"+"===l?r:-r}(e)))return this;var r=16>=Math.abs(e)?60*e:e,o=this;if(i)return o.$offset=r,o.$u=0===e,o;if(0!==e){var a=this.$u?this.toDate().getTimezoneOffset():-1*this.utcOffset();(o=this.local().add(r+a,t)).$offset=r,o.$x.$localOffset=a}else o=this.utc();return o};var d=r.format;r.format=function(e){var t=e||(this.$u?"YYYY-MM-DDTHH:mm:ss[Z]":"");return d.call(this,t)},r.valueOf=function(){var e=this.$utils().u(this.$offset)?0:this.$offset+(this.$x.$localOffset||this.$d.getTimezoneOffset());return this.$d.valueOf()-6e4*e},r.isUTC=function(){return!!this.$u},r.toISOString=function(){return this.toDate().toISOString()},r.toString=function(){return this.toDate().toUTCString()};var c=r.toDate;r.toDate=function(e){return"s"===e&&this.$offset?l(this.format("YYYY-MM-DD HH:mm:ss:SSS")).toDate():c.call(this)};var m=r.diff;r.diff=function(e,t,n){if(e&&this.$u===e.$u)return m.call(this,e,t,n);var s=this.local(),i=l(e).local();return m.call(s,i,t,n)}})},24787:function(e,t,n){"use strict";var s=n(57437),i=n(20703),l=n(64758),r=n(2265),o=n(47458);t.Z=e=>{let{className:t,alt:n="Hero image",fill:a=!0,priority:u=!0,sizes:d="100vw",sources:c,pictureStyles:m,...h}=e,f=(0,r.useMemo)(()=>({alt:n,fill:a,priority:u,sizes:d,...h}),[n,a,u,h,d]),{darkMode:v}=(0,o.Z)(),p=(0,r.useMemo)(()=>{var e,t,n,s;if(!(null==c?void 0:c.desktop))return;let{srcSet:l,...r}=(0,i.getImageProps)({...f,src:v?null==c?void 0:null===(e=c.desktop)||void 0===e?void 0:e.dark:null!==(s=null==c?void 0:null===(t=c.desktop)||void 0===t?void 0:t.light)&&void 0!==s?s:null==c?void 0:null===(n=c.desktop)||void 0===n?void 0:n.dark}).props;return{rest:{...r},desktop:l}},[f,v,null==c?void 0:c.desktop]),g=(0,r.useMemo)(()=>{var e,t,n,s;if(!(null==c?void 0:c.tablet))return;let{srcSet:l}=(0,i.getImageProps)({...f,src:v?null==c?void 0:null===(e=c.tablet)||void 0===e?void 0:e.dark:null!==(s=null==c?void 0:null===(t=c.tablet)||void 0===t?void 0:t.light)&&void 0!==s?s:null==c?void 0:null===(n=c.tablet)||void 0===n?void 0:n.dark}).props;return l},[f,v,null==c?void 0:c.tablet]),x=(0,r.useMemo)(()=>{var e,t,n,s;if(!(null==c?void 0:c.mobile))return;let{srcSet:l,...r}=(0,i.getImageProps)({...f,src:v?null==c?void 0:null===(e=c.mobile)||void 0===e?void 0:e.dark:null!==(s=null==c?void 0:null===(t=c.mobile)||void 0===t?void 0:t.light)&&void 0!==s?s:null==c?void 0:null===(n=c.mobile)||void 0===n?void 0:n.dark}).props;return l},[f,v,null==c?void 0:c.mobile]),y=(0,r.useMemo)(()=>{var e,t,n,s;if(!(null==c?void 0:c.wide))return;let{srcSet:l,...r}=(0,i.getImageProps)({...f,src:v?null==c?void 0:null===(e=c.wide)||void 0===e?void 0:e.dark:null!==(s=null==c?void 0:null===(t=c.wide)||void 0===t?void 0:t.light)&&void 0!==s?s:null==c?void 0:null===(n=c.wide)||void 0===n?void 0:n.dark}).props;return l},[f,v,null==c?void 0:c.wide]),{width:b,height:$}=h,w=(0,r.useMemo)(()=>{let e={};return b&&(e.width="".concat(b,"px")),$&&(e.height="".concat($,"px")),e},[b,$]);return(0,s.jsx)(s.Fragment,{children:(0,s.jsxs)("picture",{className:m,children:[(0,s.jsx)("source",{media:l.Xw,srcSet:y}),(0,s.jsx)("source",{media:l.oh,srcSet:null==p?void 0:p.desktop}),(0,s.jsx)("source",{media:l.Gh,srcSet:x}),(0,s.jsx)("source",{media:l.rN,srcSet:g}),(0,s.jsx)(i.default,{alt:n,...null==p?void 0:p.rest,src:null==p?void 0:p.desktop,fill:null!=a?a:void 0,className:t,...h,...b&&$?{style:w}:{}})]})})}},10435:function(e,t,n){"use strict";var s=n(57437),i=n(20208);n(2265),t.Z=e=>{let{className:t,children:n,testId:l,...r}=e;return(0,s.jsx)("div",{className:(0,i.cn)(["mx-auto max-w-7xl px-3 pt-3 md:mb-7 lg:mb-12 lg:px-8 lg:pt-8 2xl:max-w-8xl",t&&t]),"data-testid":l,...r,children:n})}},46848:function(e,t,n){"use strict";n.r(t),n.d(t,{default:function(){return R}});var s,i,l=n(57437),r=n(2265),o=n(24787),a=n(61413),u=n(20208);let d=(e,t)=>"".concat(a.Z.SITE_URL,"/assets/wof-").concat(e).concat(t?"":"-light",".png");var c=()=>(0,l.jsxs)("div",{className:(0,u.cn)(["loyalty-image-wrapper pointer-events-none absolute -top-6 left-1/2 flex h-96 w-full -translate-x-1/2 transform-gpu items-start justify-center after:bg-gradient-to-b after:from-transparent after:to-[#ebeced] md:h-118 lg:left-[49.2%] lg:h-120 xl:left-[49.2%] after:dark:bg-gradient-to-b after:dark:from-transparent after:dark:to-[#0a1c2d]"]),children:[(0,l.jsx)("div",{className:"absolute bottom-0 left-0 top-0 z-10 hidden w-1/4 bg-gradient-to-l from-transparent to-[#ebeced] opacity-100 md:block dark:from-transparent dark:to-[#0a1c2d]"}),(0,l.jsx)(o.Z,{alt:"WoF LP banner",pictureStyles:"w-full",className:"h-full w-full object-cover object-top",quality:100,priority:!0,sources:{desktop:{dark:d("desktop",!0),light:d("desktop",!1)},tablet:{dark:d("tablet",!0),light:d("tablet",!1)},mobile:{dark:d("mobile",!0),light:d("mobile",!1)}}}),(0,l.jsx)("div",{className:"absolute bottom-0 right-0 top-0 z-10 hidden w-1/4 bg-gradient-to-r from-transparent to-[#ebeced] opacity-100 md:block dark:bg-gradient-to-r dark:to-[#0a1c2d]"})]}),m=n(10435),h=n(74767),f=n(21934),v=e=>{let{title:t,children:n,className:s,...i}=e;return(0,l.jsxs)("div",{className:(0,u.cn)(["mb-7 flex flex-col items-start md:mb-8 md:items-center lg:mb-16",s&&s]),...i,children:[t&&(0,l.jsx)(f.X6,{as:"h2",className:"mb-spacing-lg text-3xl font-semibold leading-9 text-text-default",children:t}),n]})},p=n(6984),g=n(48720),x=n(65403),y=n(48565),b=n(13197),$=n(1005),w=n(6767),j=n(68381),M=e=>{var t;let{label:n,value:s,type:i="deposit",...r}=e,o=Number(s).toFixed(2),a=(0,h.C)(e=>e.bootstrap.viewFiat),u=(0,$.U8)(),d=(0,$.jD)("BTC"),c=(0,w.nR)(u||d,o);return(0,l.jsxs)("div",{className:"flex items-center space-x-1",...r,children:[(0,l.jsxs)("span",{className:"text-sm font-normal leading-5 text-text-subdued",children:[n,":"]}),"reward"===i&&(0,l.jsx)("span",{className:"text-sm font-semibold leading-5 text-text-default",children:"up to"}),(0,l.jsx)("span",{className:"text-sm font-semibold leading-5 text-text-default",children:a?"$".concat(Number(o).toLocaleString("en-US",{minimumFractionDigits:2,maximumFractionDigits:2})):c}),(0,l.jsx)("span",{children:(0,j.oU)(void 0!=u?null==u?void 0:null===(t=u.code)||void 0===t?void 0:t.toLowerCase():"btc")})]})},N=n(44683),_=e=>{let{min_deposit:t,rewards:n}=e,{t:s}=(0,N.useTranslation)(),i=s("wof_landing"),r=null==i?void 0:i.tiers;return(0,l.jsxs)("div",{className:"mb-spacing-sm flex flex-col items-center space-y-1",children:[(0,l.jsx)(M,{label:null==r?void 0:r.min_deposit_label,value:t,type:"deposit"}),(0,l.jsx)(M,{label:null==r?void 0:r.rewards_label,value:n,type:"reward"})]})},S=n(52360),k=n(35877),D=n(36777),O=n(4009),C=n(20703),z=n(62337),P=e=>{let{isOpen:t,setIsOpen:n,prizes:s}=e,{t:i}=(0,N.useTranslation)(),r=i("wof_landing"),o=null==r?void 0:r.rewards_modal;return(0,l.jsx)(f.u_,{isOpen:t,setIsOpen:n,size:"lg",title:null==o?void 0:o.title,children:(0,l.jsx)("div",{className:"flex flex-col",children:(0,l.jsx)(f.iA,{headers:["Prize","Reward"],stylingOptions:{headerStyles:"uppercase"},children:null==s?void 0:s.map((e,t)=>(0,l.jsxs)(f.SC,{children:[(0,l.jsx)(f.pj,{className:"rounded-l-lg p-3 font-medium leading-4 text-text-default",children:"Prize ".concat(t+1)}),(0,l.jsx)(f.pj,{className:"rounded-r-lg p-3 font-medium leading-4 text-text-default",children:(0,l.jsxs)("span",{className:"flex flex-row items-center justify-end",children:[(0,l.jsx)("span",{className:"mr-1",children:(null==e?void 0:e.type)?(null==e?void 0:e.type)===z.GO.Freespins?"".concat((null==e?void 0:e.fs_amount)||0," FS"):(null==e?void 0:e.type)===z.GO.Bonus?"$"+((null==e?void 0:e.bonus_amount)||0):"".concat((null==e?void 0:e.fs_amount)||0," FS")+" + $"+((null==e?void 0:e.bonus_amount)||0):0}),(0,l.jsx)(C.default,{src:(0,y.Ec)(null==e?void 0:e.type),width:16,height:16,alt:"".concat(null==e?void 0:e.type," icon")})]})})]},"rewards-list-".concat(t)))})})})},T=n(78987),Z=n(52846);function F(){return(F=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var s in n)({}).hasOwnProperty.call(n,s)&&(e[s]=n[s])}return e}).apply(null,arguments)}var U=function(e){return Z.createElement("svg",F({xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 20 20"},e),s||(s=Z.createElement("g",{clipPath:"url(#prize-icon_svg__a)"},Z.createElement("path",{fill:"url(#prize-icon_svg__b)",fillOpacity:.6,fillRule:"evenodd",d:"M3.176 5.689A2.185 2.185 0 0 0 .99 7.874v.767c0 .586.23 1.117.605 1.51.258.27.41.648.41 1.021v5.878c0 1.207.978 2.185 2.185 2.185h11.618a2.185 2.185 0 0 0 2.185-2.185v-5.878c0-.374.152-.751.41-1.022.375-.392.605-.924.605-1.509v-.767a2.185 2.185 0 0 0-2.185-2.185z",clipRule:"evenodd",opacity:.6}),Z.createElement("path",{fill:"#80D474",d:"M7.284 5.689h5.431v5.146H7.284z"}),Z.createElement("path",{fill:"#80D474",d:"M8.125 9.999h3.749v9.236H8.125z"}),Z.createElement("path",{fill:"#C4C4C4",fillRule:"evenodd",d:"m8.927 5.908 2.157-.003a1.5 1.5 0 0 0 1.094.46l4.501-.006a.864.864 0 0 0 .856-.866v-.397L14.37 5.1q-.252 0-.488-.087a7.73 7.73 0 0 1 3.35-2.329 5 5 0 0 0-.106-.258A2.54 2.54 0 0 0 15.274.808c-1.485-.243-3.39 1.872-4.207 2.877-.214-.19-.557-.381-1.072-.38-.509 0-.85.188-1.064.376C8.107 2.676 6.196.577 4.722.824a2.56 2.56 0 0 0-1.856 1.623 5 5 0 0 0-.109.271 7.27 7.27 0 0 1 3.525 2.305 1.3 1.3 0 0 1-.453.084l-3.362.005v.404a.864.864 0 0 0 .858.863l4.509-.007a1.5 1.5 0 0 0 1.093-.464",clipRule:"evenodd"}),Z.createElement("path",{fill:"#80D474",fillRule:"evenodd",d:"m8.927 5.908 2.157-.003a1.5 1.5 0 0 0 1.094.46l4.501-.006a.864.864 0 0 0 .856-.866v-.397L14.37 5.1q-.252 0-.488-.087a7.73 7.73 0 0 1 3.35-2.329 5 5 0 0 0-.106-.258A2.54 2.54 0 0 0 15.274.808c-1.485-.243-3.39 1.872-4.207 2.877-.214-.19-.557-.381-1.072-.38-.509 0-.85.188-1.064.376C8.107 2.676 6.196.577 4.722.824a2.56 2.56 0 0 0-1.856 1.623 5 5 0 0 0-.109.271 7.27 7.27 0 0 1 3.525 2.305 1.3 1.3 0 0 1-.453.084l-3.362.005v.404a.864.864 0 0 0 .858.863l4.509-.007a1.5 1.5 0 0 0 1.093-.464",clipRule:"evenodd"}))),i||(i=Z.createElement("defs",null,Z.createElement("linearGradient",{id:"prize-icon_svg__b",x1:-9.483,x2:18.425,y1:-1.75,y2:34.85,gradientUnits:"userSpaceOnUse"},Z.createElement("stop",{stopColor:"#C9ECC4"}),Z.createElement("stop",{offset:.998,stopColor:"#A6E09E"})),Z.createElement("clipPath",{id:"prize-icon_svg__a"},Z.createElement("path",{fill:"#fff",d:"M0 0h20v20H0z"})))))},Y=e=>{let{item:t,index:n,wheelSlug:s,prizes:i,exchangeGroupKey:o,lootboxGroupKey:a,className:d,...c}=e,[m,h]=(0,r.useState)(!1),{t:v}=(0,N.useTranslation)(),$=v("wof_landing"),w=null==$?void 0:$.tiers,{user:{isAuthenticated:j}}=(0,p.useAuth)(),{data:M,isLoading:z}=(0,g.Y)(),{currentLevel:Z,isLoading:F}=(0,b.m)(),Y=(0,r.useMemo)(()=>{if(j)return(0,x.fC)(M,a,o)},[j,M,a,o]),E=Y&&(null==Y?void 0:Y.length)>0,H=(z||F)&&j;return(0,l.jsx)("div",{className:(0,u.cn)(["relative min-w-[18.75rem] rounded-3xl bg-bgr-lightest p-7 lg:min-w-[21rem]",d]),...c,children:(0,l.jsxs)("div",{children:[(0,l.jsxs)("div",{className:"flex flex-col",children:[(0,l.jsx)(f.X6,{as:"h4",className:"mb-2 text-center text-xl font-bold",children:null==t?void 0:t.title}),(0,l.jsx)(_,{min_deposit:null==t?void 0:t.min_fiat_deposit,rewards:null==t?void 0:t.max_rewards}),(0,l.jsx)(S.Z,{label:E?(null==Y?void 0:Y.length)>1?null==w?void 0:w.input_code_label_spin:null==w?void 0:w.input_code_label_spin_singular:null==w?void 0:w.input_code_label,value:E?null==Y?void 0:Y.length:null==t?void 0:t.coupon_code,type:null==t?void 0:t.type,icon:E?(0,l.jsx)(D.Z,{}):(0,l.jsx)(k.Z,{}),className:"mb-2"}),(0,l.jsx)(r.Suspense,{fallback:(0,l.jsx)(O.Dj,{className:"mb-1 h-[42px] w-full lg:w-full"}),children:H?(0,l.jsx)(O.Dj,{className:"mb-1 h-[42px] w-full lg:w-full"}):(0,l.jsx)(T.Z,{wheelSlug:s,exchangeGroupKey:o,lootboxGroupKey:a,item:t,content:w})}),(0,l.jsx)(f.hU,{className:"!space-x-spacing-2xs",iconLeft:(0,l.jsx)(U,{className:"h-4 w-4"}),ghost:!0,size:"md",color:"tertiary",onClick:()=>h(!m),children:null==w?void 0:w.rewards_btn})]}),(0,l.jsx)("div",{className:(0,u.cn)(["absolute -top-10 left-1/2 z-30 h-16 w-16 -translate-x-1/2 transform rounded-full border-8  border-bgr-default"]),children:(0,l.jsx)(C.default,{src:(0,y.hB)(null==t?void 0:t.type),layout:"fill",alt:"".concat(null==t?void 0:t.type," icon")})}),(0,l.jsx)(P,{isOpen:m,setIsOpen:h,prizes:i})]})})},E=n(75899),H=n(48884),I=e=>{let{className:t}=e;return(0,l.jsx)("div",{className:(0,u.cn)(["relative min-w-[18.75rem] rounded-3xl bg-bgr-lightest p-7 lg:min-w-[21rem]",t]),children:(0,l.jsxs)("div",{className:"flex flex-col",children:[(0,l.jsx)(O.Dj,{className:"mx-auto mb-2 h-7.5 w-1/3 lg:w-1/3"}),(0,l.jsxs)("div",{className:"mb-spacing-sm flex flex-col items-center space-y-1",children:[(0,l.jsx)(O.Dj,{className:"mx-auto h-6 w-2/3 lg:w-2/3"}),(0,l.jsx)(O.Dj,{className:"mx-auto h-6"})]}),(0,l.jsx)("div",{className:"mb-2",children:(0,l.jsx)(H.Z,{})}),(0,l.jsx)(O.Dj,{className:"mb-1 h-10 w-full lg:w-full"}),(0,l.jsx)(O.Dj,{className:"mx-auto w-1/3 lg:w-1/3"})]})})},L=n(64758),q=()=>{var e;let{matchesQuery:t}=(0,L.ZP)(L.Gh),n=(0,h.C)(e=>e.bootstrap.isSidemenuOpen),{data:s,isPending:i}=(0,z.c0)(),o=(0,r.useMemo)(()=>{var e,t,n;if(!i)return null==s?void 0:null===(n=s.wheelOfFortunes)||void 0===n?void 0:null===(t=n.data)||void 0===t?void 0:null===(e=t.sort((e,t)=>{var n,s,i,l;return(null==e?void 0:null===(s=e.attributes)||void 0===s?void 0:null===(n=s.tier)||void 0===n?void 0:n.order)-(null==t?void 0:null===(l=t.attributes)||void 0===l?void 0:null===(i=l.tier)||void 0===i?void 0:i.order)}))||void 0===e?void 0:e.map(e=>{var t,n,s,i,l;return{tier:null==e?void 0:null===(t=e.attributes)||void 0===t?void 0:t.tier,slug:null==e?void 0:null===(n=e.attributes)||void 0===n?void 0:n.slug,prizes:null==e?void 0:null===(s=e.attributes)||void 0===s?void 0:s.prizes,exchange_group_key:null==e?void 0:null===(i=e.attributes)||void 0===i?void 0:i.exchange_group_key,lootbox_group_key:null==e?void 0:null===(l=e.attributes)||void 0===l?void 0:l.lootbox_group_key}})},[i,null==s?void 0:null===(e=s.wheelOfFortunes)||void 0===e?void 0:e.data]),a=(0,r.useMemo)(()=>i?Array.from({length:3}).map((e,t)=>(0,l.jsx)(I,{},"wof-loader-".concat(t))):null==o?void 0:o.map((e,t)=>{var n;return(0,l.jsx)(Y,{item:null==e?void 0:e.tier,exchangeGroupKey:null==e?void 0:e.exchange_group_key,lootboxGroupKey:null==e?void 0:e.lootbox_group_key,prizes:null==e?void 0:e.prizes,wheelSlug:"".concat(null==e?void 0:e.slug,"-wheel"),index:t},"".concat(t,"-").concat(null==e?void 0:null===(n=e.tier)||void 0===n?void 0:n.type))}),[i,o]);return(0,l.jsx)(v,{className:(0,u.cn)(["relative z-20 pt-[16.5rem] sm:pt-[18rem] md:pt-[20rem] lg:pt-[18rem] xl:pt-[24.2rem] 2xl:pt-[24.1rem]",n?"min-[1200px]:!pt-[17rem] min-[1500px]:!pt-[25.5rem]":"min-[1200px]:!pt-[19.4rem] min-[1500px]:!pt-[26.5rem]"]),children:(0,l.jsx)("div",{className:"relative w-full overflow-visible lg:flex lg:justify-center",children:(0,l.jsx)(E.Z,{space:"8",showArrows:!0,itemsWrapperStyles:"pt-10",rightBtnStyles:"mt-[24px]",leftBtnStyles:"mt-[24px]",containerStyles:"md:w-auto",items:a,slideWidth:t?300:336})})})},A=e=>{let{index:t,step:n}=e;return(0,l.jsxs)("div",{className:"flex items-center space-x-spacing-md rounded-2xl bg-bgr-lighter p-7",children:[(0,l.jsx)("div",{className:"relative h-12 w-12 flex-shrink-0",children:(0,l.jsx)(o.Z,{alt:"step_".concat(t),fill:!0,sources:{mobile:{dark:"/assets/steps/step".concat(t+1,".svg"),light:"/assets/steps/step".concat(t+1,"-light.svg")},tablet:{dark:"/assets/steps/step".concat(t+1,".svg"),light:"/assets/steps/step".concat(t+1,"-light.svg")},desktop:{dark:"/assets/steps/step".concat(t+1,".svg"),light:"/assets/steps/step".concat(t+1,"-light.svg")},wide:{dark:"/assets/steps/step".concat(t+1,".svg"),light:"/assets/steps/step".concat(t+1,"-light.svg")}}})}),(0,l.jsxs)("div",{className:"flex flex-col",children:[(0,l.jsx)(f.X6,{as:"h4",className:"mb-1 text-base font-semibold leading-4 text-text-default",children:n.title}),(0,l.jsx)(f.xv,{size:"sm",className:"leading-5 text-text-subdued",children:n.description})]})]})},B=e=>{let{className:t}=e;return(0,l.jsx)("svg",{className:t,width:"25",height:"24",viewBox:"0 0 25 24",fill:"none",xmlns:"http://www.w3.org/2000/svg",children:(0,l.jsx)("path",{d:"M17.1964 11.9073C17.1739 11.7052 17.0855 11.5145 16.9431 11.361L10.6003 4.4355C10.3727 4.12037 9.97236 3.95519 9.57031 4.01058C9.16826 4.06596 8.83571 4.33212 8.71486 4.69524C8.59401 5.05836 8.70624 5.45417 9.00357 5.71343L14.7628 12L9.00357 18.2866C8.70624 18.5458 8.59401 18.9416 8.71486 19.3048C8.83571 19.6679 9.16826 19.934 9.57031 19.9894C9.97236 20.0448 10.3727 19.8796 10.6003 19.5645L16.9431 12.639C17.1295 12.437 17.2209 12.1732 17.1964 11.9073Z"})})},K=()=>{let{t:e}=(0,N.useTranslation)(),t=e("wof_landing"),n=null==t?void 0:t.how_it_works;return(0,l.jsx)(v,{className:"mb-0 w-full lg:mb-0",title:null==n?void 0:n.title,children:(0,l.jsx)("div",{className:"flex w-full flex-col space-y-2  lg:max-w-5xl lg:flex-row lg:justify-between lg:space-y-0",children:null==n?void 0:n.steps.map((e,t)=>(0,l.jsxs)(r.Fragment,{children:[(0,l.jsx)(A,{step:e,index:t}),t!==(null==n?void 0:n.steps.length)-1&&(0,l.jsx)("div",{className:"hidden justify-center lg:flex lg:items-center",children:(0,l.jsx)(B,{className:"fill-current text-neutrals-20"})})]},"step-".concat(null==e?void 0:e.title,"-").concat(t)))})})},Q=n(94708),R=e=>{let{content:t}=e,n=(0,Q.w)({attributes:t});return(0,l.jsxs)("div",{className:"relative",children:[(0,l.jsx)(c,{}),(0,l.jsxs)(m.Z,{className:"relative z-30 sm:pl-9 sm:pr-7 lg:pl-10 lg:pr-8",children:[(0,l.jsx)(q,{}),(0,l.jsx)(K,{}),n.map((e,t)=>{var n;return r.cloneElement(e,{key:null!==(n=e.key)&&void 0!==n?n:t})})]})]})}},17802:function(e,t,n){"use strict";n.d(t,{DD:function(){return f},KQ:function(){return v},xe:function(){return h}});var s=n(2265),i=n(73667),l=n(47082),r=n(20568),o=n(27504),a=n(6984),u=n(16484),d=n(44683),c=n(95285),m=n(4249);let h=function(){let e=arguments.length>0&&void 0!==arguments[0]&&arguments[0],t=!(arguments.length>1)||void 0===arguments[1]||arguments[1],{user:n}=(0,a.useAuth)(),{data:l,isLoading:r,refetch:u,isPending:d}=(0,i.useQuery)({queryKey:["accounts",e],queryFn:e=>{let{queryKey:t}=e,n=!1===t[1]?"player/accounts":"player/accounts?compatibility=false";return(0,o.ZP)(n)},enabled:(null==n?void 0:n.isAuthenticated)&&t}),c=(0,s.useMemo)(()=>{if(!n.isLoading)return n&&!n.isLoading&&(null==n?void 0:n.currentUser)&&(null==l?void 0:l.find(e=>{var t;return e.currency===(null==n?void 0:null===(t=n.currentUser)||void 0===t?void 0:t.currency)}))},[l,n]);return{accounts:l||[],account:c,refetch:u,isLoading:r,isPending:d}},f=()=>{let{t:e}=(0,d.useTranslation)(),{track:t}=(0,m.z)(),n=(0,c.J)(),{toast:s}=(0,u.useToast)(),i=(0,l.useQueryClient)();return(0,r.useMutation)({mutationKey:["updatePlayerAccount"],mutationFn:e=>{try{return(0,o.ZP)("player/accounts",{currency:e},"POST").then(n=>(t("account_currency_changed",{category:"user",label:e}),n))}catch(e){throw e}},onMutate:async e=>{await i.cancelQueries({queryKey:["accounts"]}),await i.cancelQueries({queryKey:["currentUser"]});let t=i.getQueryData(["accounts"]);return i.setQueryData(["accounts"],e),{prevFavoriteData:t}},onError:e=>{i.setQueryData(["accounts"],e.prevFavoriteData)},onSettled:()=>{s({state:"success",title:null==n?void 0:n.updated_wallet,autoClose:1500}),i.invalidateQueries({queryKey:["currentUser"]}),i.invalidateQueries({queryKey:["accounts"]})}})},v=function(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:null,t=arguments.length>1&&void 0!==arguments[1]&&arguments[1],n=arguments.length>2&&void 0!==arguments[2]&&arguments[2],{formatCurrency:i}=(0,u.useCurrencyFormatter)(),{account:l={},accounts:r,refetch:o}=h(n),a=(0,s.useMemo)(()=>e?r.find(t=>t.currency===e):l,[e,r,l]),d=(0,s.useMemo)(()=>a&&a.currency&&i(a.amount_cents,a.currency),[i,a]),c=(0,s.useMemo)(()=>{if(!d||!a)return;let e=d.split(" ")[0];return"BTC"===a.currency?Number(e)/1e3:e},[d,a]);return{refetch:o,balance:t?c:d,withdrawableBalance:a&&a.currency&&i(null==a?void 0:a.available_to_cashout_cents,null==a?void 0:a.currency)}}},1005:function(e,t,n){"use strict";n.d(t,{U8:function(){return a},jD:function(){return u},jg:function(){return o}});var s=n(73667),i=n(27504),l=n(17802),r=n(83406);let o=e=>{let{data:t=[],isLoading:n}=(0,s.useQuery)({queryKey:["currencies"],queryFn:async()=>await (0,i.ZP)("info/currencies"),retry:!1,...e});return{data:null==t?void 0:t.filter(e=>!r.m8.includes(e.code)),isLoading:n}},a=()=>{let{data:e}=o(),{account:t={}}=(0,l.xe)();return e.find(e=>e.code===t.currency)},u=e=>{let{data:t}=o();return t.find(t=>t.code===(null==e?void 0:e.toUpperCase()))}},6767:function(e,t,n){"use strict";n.d(t,{JS:function(){return c},NZ:function(){return o.NZ},OO:function(){return a},a4:function(){return u},nR:function(){return d}});var s=n(57437),i=n(2265),l=n(4009),r=n(1005),o=n(3938);let a=function(e){var t;let n=arguments.length>1&&void 0!==arguments[1]&&arguments[1],{data:a,isLoading:u}=(0,o.NZ)(),{data:d=[]}=(0,r.jg)(),c=(0,i.useMemo)(()=>null==a?void 0:a.find(t=>t.symbol===(null==e?void 0:e.currency)),[null==e?void 0:e.currency,a]),m=d.find(t=>t.code===(null==e?void 0:e.currency)),h=(0,i.useMemo)(()=>{if(!m)return;let t=null==c?void 0:c.quote.USD.price;return(null==e?void 0:e.amount_cents)/m.subunits_to_unit*t},[c,e,m]);return 0>=Number(null==e?void 0:null===(t=e.balance)||void 0===t?void 0:t.split(" ")[0])?"$0.00":u?(0,s.jsx)(l.Dj,{className:"h-1.5 w-auto"}):n&&h?(Math.floor(100*h)/100).toFixed(2).toString():h?"$".concat(parseFloat(h).toFixed(2)):"$0.00"},u=(e,t,n,r)=>{let{data:a,isLoading:u}=(0,o.NZ)(n),d=(0,i.useMemo)(()=>null==a?void 0:a.find(t=>(null==t?void 0:t.symbol)===(null==e?void 0:e.code)),[e,a]),c=(0,i.useMemo)(()=>t*(null==d?void 0:d.quote.USD.price),[d,t]);if(u)return(0,s.jsx)(l.Dj,{className:"ml-auto h-6 w-12 lg:w-12"});if(c){let e=(Math.floor(100*c)/100).toFixed(2).toString();return r?e:"$".concat(e)}return"$0.00"},d=(e,t,n)=>{let{data:r,isLoading:a}=(0,o.NZ)(),u=(0,i.useMemo)(()=>null==r?void 0:r.find(t=>(null==t?void 0:t.symbol)===(null==e?void 0:e.code)),[e,r]),d=(0,i.useMemo)(()=>t/(null==u?void 0:u.quote.USD.price),[u,t]);return a?(0,s.jsx)(l.Dj,{className:"h-1.5 w-auto"}):d?"".concat(parseFloat(d.toString()).toFixed(n||4)):"$0.00"},c=(e,t)=>{let{data:n,isLoading:a}=(0,o.NZ)(),{data:u=[]}=(0,r.jg)(),d=(0,i.useMemo)(()=>null==n?void 0:n.find(t=>t.symbol===(null==e?void 0:e.code)),[e,n]),c=u.find(t=>t.code===(null==e?void 0:e.code)),m=(0,i.useMemo)(()=>{if(!c)return;let e=null==d?void 0:d.quote.USD.price;return t/c.subunits_to_unit*e},[d,t,c]);if(a)return(0,s.jsx)(l.Dj,{className:"h-1.5 w-auto"});if(m){let e=0>parseFloat(m.toString()),t=new Intl.NumberFormat("en-US",{style:"currency",currency:"USD"}).format(parseFloat(m.toString()));return e?"-$".concat(t.split("$")[1]):t}return"$0.00"}},74767:function(e,t,n){"use strict";n.d(t,{C:function(){return l},T:function(){return i}});var s=n(30168);let i=s.I0,l=s.v9},92856:function(e,t,n){"use strict";var s=n(2265),i=n(72693);let{useState:l,useEffect:r}=s;t.Z=e=>{let{date:t,short:n=!1,enabled:o=!0}=e,a=new Date(1e3*(0,i.Z)(t).unix()).getTime(),[u,d]=l(),c=(0,s.useMemo)(()=>{let e=(0,i.Z)(),n=(0,i.Z)(t);return(0,i.Z)(n).isBefore(e)},[t]),m=s.useCallback(()=>{if(a){let e=a-new Date().getTime(),t=Math.floor(e/864e5),n=Math.floor(e%864e5/36e5),s=Math.floor(e%36e5/6e4),i=Math.floor(e%6e4/1e3);t="".concat(t),n<10&&(n="0".concat(n)),s<10&&(s="0".concat(s)),i<10&&(i="0".concat(i)),d({days:t,hours:n,minutes:s,seconds:i})}},[a]);r(()=>{if(!o)return;let e=setInterval(()=>{c?clearInterval(e):m()},1e3);return c&&clearInterval(e),()=>clearInterval(e)},[m,c,o]);let h=(0,s.useMemo)(()=>({days:null==u?void 0:u.days,hours:null==u?void 0:u.hours,minutes:null==u?void 0:u.minutes,seconds:null==u?void 0:u.seconds}),[null==u?void 0:u.days,null==u?void 0:u.hours,null==u?void 0:u.minutes,null==u?void 0:u.seconds]),f=(0,s.useCallback)(()=>0===Number(null==h?void 0:h.days)?"":1===Number(null==h?void 0:h.days)?"".concat(null==h?void 0:h.days," day"):"".concat(null==h?void 0:h.days," days"),[null==h?void 0:h.days]),v=!(null==h?void 0:h.days)&&!(null==h?void 0:h.hours)&&!(null==h?void 0:h.minutes)&&!(null==h?void 0:h.seconds);return{state:h,short:n,checkDay:f,ended:c,hasNoState:v}}}},function(e){e.O(0,[5736,5878,6484,6769,3285,465,703,8792,4657,3369,7306,6708,4573,168,377,5848,2337,4708,4690,6937,2971,6446,1744],function(){return e(e.s=94537)}),_N_E=e.O()}]);