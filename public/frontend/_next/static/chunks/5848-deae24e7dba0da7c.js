(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[5848],{41873:function(e,t,s){"use strict";var r,l=s(52846);function a(){return(a=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var s=arguments[t];for(var r in s)({}).hasOwnProperty.call(s,r)&&(e[r]=s[r])}return e}).apply(null,arguments)}t.Z=function(e){return l.createElement("svg",a({xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 16 16"},e),r||(r=l.createElement("path",{fill:"current",d:"M13.232 2.117c-.598-.332-1.464-.546-2.234-.45-1.347.182-2.234.93-2.993 1.85-.77-.93-1.806-1.785-3.196-1.86-.884-.048-1.443.128-2.041.46a4.17 4.17 0 0 0-2.16 3.666c0 .302.075.887.203 1.283.536 2.413 4.29 5.292 6.152 6.592.63.439 1.455.439 2.084-.001 1.859-1.3 5.606-4.179 6.141-6.591.129-.406.204-.834.204-1.283 0-1.582-.877-2.95-2.16-3.666"})))}},16054:function(e,t,s){"use strict";var r,l,a=s(52846);function n(){return(n=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var s=arguments[t];for(var r in s)({}).hasOwnProperty.call(s,r)&&(e[r]=s[r])}return e}).apply(null,arguments)}t.Z=function(e){return a.createElement("svg",n({xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 56 56"},e),r||(r=a.createElement("rect",{rx:28})),l||(l=a.createElement("path",{d:"M21.237 21.093v13.814a1.33 1.33 0 0 0 2.053 1.12l10.853-6.907c.827-.52.827-1.72 0-2.253L23.29 19.973a1.33 1.33 0 0 0-2.053 1.12"})))}},64680:function(e,t,s){"use strict";s.d(t,{Z:function(){return c}});var r=s(57437),l=s(20703),a=s(2265);s(90247);var n=s(20208),i=e=>{let{target:t,onIntersect:s,threshold:r=.1,rootMargin:l="0px",root:n=null,freezeOnceVisible:i=!1}=e,[c,u]=(0,a.useState)(),o=(null==c?void 0:c.isIntersecting)&&i,d=e=>{let[t]=e;u(t),s&&s(t)};return(0,a.useEffect)(()=>{let e=null==t?void 0:t.current;if(!window.IntersectionObserver||o||!e)return;let s=new IntersectionObserver(d,{threshold:r,root:n,rootMargin:l});return s.observe(e),()=>s.disconnect()},[null==t?void 0:t.current,JSON.stringify(r),n,l,o]),c},c=e=>{let{src:t,fallBackUrl:s,alt:c,className:u,...o}=e,[d,m]=(0,a.useState)(!1),[f,x]=a.useState(t),[h,v]=(0,a.useState)(!0),g=(0,a.useRef)(null);return i({target:g,onIntersect:e=>{m(e.isIntersecting)},threshold:.1,rootMargin:"0px",root:null,freezeOnceVisible:!0}),(0,r.jsx)("div",{ref:g,className:(0,n.cn)(["image-container !absolute inset-0 bg-bgr-subtile",h?"blur":"unblur",u]),children:d&&(0,r.jsxs)(r.Fragment,{children:[h&&(0,r.jsx)(l.default,{alt:c,src:f.replace(/width=\d+/,"width=".concat(20)).replace(/quality=\d+|quality=/,"quality=".concat(1)),onError:()=>x(s),quality:1,className:(0,n.cn)(["placeholder-image block object-cover transition-all duration-500 ease-in-out"]),fill:!0,...o}),(0,r.jsx)(l.default,{alt:c,src:f,quality:75,onError:()=>x(s),onLoad:()=>{v(!1)},className:"real-image object-cover",fill:!0,...o})]})})}},75899:function(e,t,s){"use strict";var r=s(57437);s(2265);var l=s(21934);t.Z=e=>{let{items:t,space:s="8",itemsWrapperStyles:a,containerStyles:n,withPagination:i=!1,rightBtnStyles:c,leftBtnStyles:u,showArrows:o,paginationStyles:d,withGradient:m,slideWidth:f,gradientFrom:x}=e;return(0,r.jsx)(l.r1,{gradientFrom:x,withGradient:m,showArrows:o,slideWidth:f,stylingOptions:{containerStyles:n,itemsWrapperStyles:a,ogLeftButtonStyles:u,ogRightButtonStyles:c,paginationStyles:d},space:s,withPagination:i,items:t})}},23318:function(e,t,s){"use strict";s.d(t,{m:function(){return y},Z:function(){return k}});var r=s(57437),l=s(2265),a=s(78267),n=s(70865),i=s(4009),c=s(750),u=s(8792),o=s(6984),d=s(10834),m=s(97647),f=s(16054),x=s(29808),h=s(20208),v=s(77431);let g=l.memo(e=>{let{game:t}=e,s=(0,d.Z)(null==t?void 0:t.provider),{mutateAsync:n}=(0,a.bO)(),{mutateAsync:i}=(0,a.WK)(),{favoriteGameIdentifiers:g,completeGames:p,favoriteIdsAndIdentifiers:j}=(0,a.fp)(),{isRestricted:w,isPending:b}=(0,x.Z)(null==t?void 0:t.provider),{open:y}=(0,m.ZP)(),{user:{isAuthenticated:N}}=(0,o.useAuth)(),k=(0,l.useCallback)(()=>{(null==g?void 0:g.includes(t.identifier))?i({gameID:t.id,completeGame:t}):n({gameID:t.id,completeGame:t})},[n,g,t,i]);return(0,r.jsx)("div",{children:(0,r.jsx)(u.default,{href:"/games/".concat(null==t?void 0:t.slug),className:(0,h.cn)(["relative block",w&&"cursor-default"]),onClick:e=>{if(s){e.preventDefault(),y("fill-profile");return}w&&e.preventDefault()},children:(0,r.jsx)(c.y,{provider:null==t?void 0:t.provider,tag:null==t?void 0:t.payout,isFavorited:null==g?void 0:g.includes(t.identifier),hideFavoriteButton:!N,onFavoriteClick:k,carouselDisplayed:!0,imageUrl:"https://cdn.wild.io/thumbnail/".concat(null==t?void 0:t.identifier,".png"),fallBackUrl:"".concat(v.V,"/thumbnail/").concat(null==t?void 0:t.identifier.split("/")[0],"/").concat(null==t?void 0:t.identifier.split("/")[1],".webp"),title:t.title,playIcon:(0,r.jsx)(f.Z,{})})})},null==t?void 0:t.slug)});g.displayName="GameCarouselItem";var p=s(75899),j=s(64758),w=s(47458),b=s(95811);let y=()=>(0,r.jsx)("div",{className:"flex w-full items-center space-x-2 overflow-hidden",children:Array.from({length:10}).map((e,t)=>(0,r.jsx)("div",{children:(0,r.jsx)(i.Et,{className:"h-[213px] w-40"})},"game-card-loader-".concat(t)))}),N=l.memo(e=>{let{tagText:t,tagType:s,identifier:i}=e,{matchesQuery:c,isLoading:u}=(0,j.ZP)(j.Gh),{darkMode:o}=(0,w.Z)(),{mutateAsync:d}=(0,a.bO)(),{mutateAsync:m}=(0,a.WK)(),{favoriteGameIdentifiers:f}=(0,a.fp)(),x=(0,b.useIsMobile)(),{data:h,isLoading:v}=(0,n.V)({device:x?"mobile":"desktop",without_territorial_restrictions:!0,page:1,page_size:15,filter:{categories:{identifiers:[i]}}},{enabled:i&&""!==i}),N=(0,l.useMemo)(()=>{var e;let l=null==h?void 0:null===(e=h.pages[0])||void 0===e?void 0:e.data;return l?null==l?void 0:l.map(e=>(0,r.jsx)(g,{game:e,favoriteGames:f,addToFavorites:d,removeFromFavorites:m,tagText:t,tagType:s},"game-carouse-".concat(e.id))):[]},[d,f,null==h?void 0:h.pages,m,t,s]);return v?(0,r.jsx)("div",{className:"pt-3",children:(0,r.jsx)(y,{})}):(0,r.jsx)(l.Suspense,{fallback:(0,r.jsx)(y,{}),children:(0,r.jsx)("div",{className:"relative",children:(0,r.jsx)(p.Z,{withGradient:!0,gradientFrom:o?"#0a1c2d":"#ebeced",itemsWrapperStyles:"pt-3 relative",space:c?"8":"12",items:N,slideWidth:u||c?128:160})})})});N.displayName="NewGamesCarousel";var k=N},82374:function(e,t,s){"use strict";s.d(t,{$A:function(){return r}});let r=["accumulating","booming-tournament","fresh-releases","_hd","not_slots","top-games","vip-games"]},98539:function(e,t,s){"use strict";s.d(t,{Mz:function(){return r},nz:function(){return l}}),s(82374),s(27504),s(99611),s(1785),s(61413);let r=e=>(null==e?void 0:e.map(e=>({id:e.id,value:e.title})))||[],l=e=>(null==e?void 0:e.map(e=>({id:e.id,value:e.title})).sort((e,t)=>e.value.localeCompare(t.value)))||[]},10306:function(e,t,s){"use strict";var r=s(57437);s(2265);var l=s(21934),a=s(41873),n=s(20208);t.Z=e=>{let{isFavorited:t=!1,onFavoriteClick:s,className:i}=e;return(0,r.jsx)(l.hU,{iconOnly:!0,color:"tertiary",onClick:e=>(e.preventDefault(),s&&s(e)),size:"sm",iconRight:(0,r.jsx)(a.Z,{className:(0,n.cn)([t&&"fill-current text-red-500"])}),className:(0,n.cn)(["absolute right-2 top-2 flex items-center justify-center !rounded-full  text-text-on-primary [&>span]:!h-5 [&>span]:!w-5",i])})}},77431:function(e,t,s){"use strict";s.d(t,{V:function(){return l}});var r=s(61413);let l=s(83406).Mw?r.Z.SITE_URL:"https://wild.io"},750:function(e,t,s){"use strict";s.d(t,{y:function(){return p}});var r=s(57437),l=s(2265),a=e=>{let{rtp:t,className:s,...r}=e;return null},n=s(20208);s(78135);var i=s(2388),c=s(10306),u=s(29808),o=s(44683),d=()=>{var e,t;let{t:s}=(0,o.useTranslation)(),l=s("general"),a=null==l?void 0:l.restricted_page;return(0,r.jsxs)("div",{className:"absolute inset-0 flex flex-col items-center justify-center p-1",children:[(0,r.jsx)("div",{className:"mb-1 text-center font-bold text-white",children:null==a?void 0:null===(e=a.gamecard)||void 0===e?void 0:e.title}),(0,r.jsx)("div",{className:"text-center text-xs font-medium text-[#ADBDCC]",children:null==a?void 0:null===(t=a.gamecard)||void 0===t?void 0:t.description})]})},m=e=>{let{show:t,title:s,playIcon:l,hideFavoriteButton:a,onFavoriteClick:n,isFavorited:o,provider:m}=e,{isRestricted:f,isPending:x}=(0,u.Z)(m);return(0,r.jsx)(i.u,{show:t,appear:!0,enter:"transition duration-200 ease-linear",enterFrom:"opacity-0",enterTo:"opacity-100",leave:"transition duration-200 ease-out",leaveFrom:"opacity-100",leaveTo:"opacity-0",className:"absolute inset-0 z-50 flex items-center  justify-center border-2 border-gray-800/90 bg-gray-800/90 ",children:f?(0,r.jsx)(d,{}):(0,r.jsxs)(r.Fragment,{children:[!a&&(0,r.jsx)(c.Z,{isFavorited:o,onFavoriteClick:n}),(0,r.jsxs)("div",{className:"relative flex flex-col items-center justify-center px-4 text-text-on-primary",children:[(0,r.jsx)("span",{className:"mb-spacing-2xs text-center text-base font-medium leading-4",children:s}),(0,r.jsx)("span",{className:"mb-1.5 text-xs capitalize text-text-subdued",children:m}),(0,r.jsx)("span",{className:"h-10 w-10 rounded-full bg-bgr-hovered [&>svg]:fill-current [&>svg]:text-base-primary",children:l})]})]})})},f=s(64758),x=s(4009),h=s(64680),v=s(20703),g=e=>{let{src:t,isPending:s,setSrc:l,imageUrl:a,image:n,title:i,fallBackUrl:c}=e;return t?s?(0,r.jsxs)("div",{children:[(0,r.jsx)(v.default,{className:"-indent-100",fill:!0,src:t,onError:()=>l(null!=c?c:""),alt:"",sizes:"(max-width: 768px) 50vw, (max-width: 1200px) 33vw, 15vw"}),(0,r.jsx)(x.v9,{className:"absolute inset-0"})]}):a&&!n?(0,r.jsx)(h.Z,{src:t,fallBackUrl:null!=c?c:"",alt:"Game card image for ".concat(i),sizes:"(max-width: 768px) 50vw, (max-width: 1200px) 33vw, 15vw"}):n:(0,r.jsx)(x.v9,{})};let p=e=>{let{image:t,imageUrl:s,title:i,tag:c,provider:o,onClick:d,playIcon:x,fallBackUrl:h,carouselDisplayed:v=!1,hideFavoriteButton:p=!1,onFavoriteClick:j,isFavorited:w}=e,[b,y]=(0,l.useState)(!1),[N,k]=(0,l.useState)(!1),{matchesQuery:S}=(0,f.ZP)(f.Gh);(0,l.useEffect)(()=>{let e=b&&setTimeout(()=>k(!0),300);return()=>clearTimeout(e)},[b]);let[F,C]=l.useState(s),{isRestricted:A,isPending:_}=(0,u.Z)(o);return(0,r.jsx)("div",{"data-testid":"game-card",onMouseEnter:()=>y(!0),onMouseLeave:()=>{y(!1),k(!1)},onClick:d,className:(0,n.cn)(["relative flex\n      flex-col\n      rounded-2xl\n      border-none"]),children:(0,r.jsxs)("div",{className:(0,n.cn)(["image-wrapper relative aspect-[3/4]  overflow-hidden transition duration-200 ease-in-out",!S&&b&&"-translate-y-2",v&&"w-32 md:w-40"]),children:[A&&(0,r.jsx)("div",{className:"pointer-events-none absolute inset-0 z-10 bg-gray-800/50"}),N&&(0,r.jsx)(m,{provider:o,show:N,title:i,playIcon:x,hideFavoriteButton:p,isFavorited:w,onFavoriteClick:j}),(0,r.jsx)(g,{src:F,isPending:_,setSrc:C,onError:()=>C(null!=h?h:""),imageUrl:s,image:t,title:i,fallBackUrl:h}),(0,r.jsx)(a,{rtp:c})]})})}},35829:function(e,t,s){"use strict";var r=s(57437),l=s(20208),a=s(21934),n=s(8792),i=s(2265);t.Z=e=>{let{title:t,titleStyles:s,href:c,icon:u,trailingElement:o,className:d,children:m}=e,f=(0,i.useMemo)(()=>(0,r.jsxs)("div",{className:"flex flex-row items-center space-x-spacing-xs truncate",children:[u&&(0,r.jsx)("div",{className:"relative flex h-7 w-7 items-center justify-center",children:u}),(0,r.jsx)(a.X6,{as:"h2",className:"max-w-[12rem] truncate  text-xl font-semibold sm:max-w-none",children:t})]}),[t,u]);return(0,r.jsxs)("div",{className:(0,l.cn)(["mb-7 md:mb-8",d]),children:[t&&(0,r.jsxs)("div",{className:(0,l.cn)(["mb-3 flex flex-row items-center justify-between",s]),children:[c?(0,r.jsx)(n.default,{href:c,passHref:!0,prefetch:!1,children:f}):f,o]}),m]})}},95811:function(e,t,s){"use strict";s.r(t),s.d(t,{IsMobileProvider:function(){return c},useIsMobile:function(){return i}});var r=s(57437),l=s(2265),a=s(98274);let n=(0,l.createContext)(void 0),i=()=>{let e=(0,l.useContext)(n);return e?e.isUserAgentMobile:(console.warn("useIsMobile was used outside of IsMobileProvider. Falling back to default."),a.isMobile)},c=e=>{let{isUserAgentMobile:t=a.isMobile,children:s}=e,i=(0,l.useMemo)(()=>({isUserAgentMobile:t}),[t]);return(0,r.jsx)(n.Provider,{value:i,children:s})}},4009:function(e,t,s){"use strict";s.d(t,{BL:function(){return x},DC:function(){return I},Dj:function(){return h},Et:function(){return d},HQ:function(){return O},IV:function(){return f},LC:function(){return p},MM:function(){return b},Mb:function(){return N},Nu:function(){return S},OZ:function(){return j},PD:function(){return A},PS:function(){return Z},RB:function(){return L},TN:function(){return D},Vj:function(){return P},Y:function(){return m},_8:function(){return G},b:function(){return k},es:function(){return U},gv:function(){return T},hN:function(){return g},j3:function(){return C},l_:function(){return v},mV:function(){return w},mg:function(){return E},pi:function(){return _},v9:function(){return o},vF:function(){return M},w7:function(){return y},yq:function(){return F}});var r=s(57437);s(2265),s(99670);var l=s(21934),a=s(20208),n=s(35829),i=s(23318),c=s(20703),u=s(47458);let o=e=>{let{className:t}=e;return(0,r.jsx)("div",{className:(0,a.cn)(["mb-1.5 h-full w-full rounded-2xl bg-surface-subdued",t])})},d=e=>{let{className:t}=e;return(0,r.jsx)("div",{className:(0,a.cn)(["aspect-[3/4] rounded-2xl bg-surface-subdued",t])})},m=()=>(0,r.jsx)(p,{className:"h-[11.5rem] w-28 rounded-radius-md 2xl:h-[12.5rem]"}),f=e=>{let{className:t}=e;return(0,r.jsxs)("div",{className:(0,a.cn)(["flex flex-row gap-2",t]),children:[(0,r.jsx)(p,{className:"h-10 w-8 rounded-radius-md"}),(0,r.jsx)(p,{className:"h-10 w-8 rounded-radius-md"}),(0,r.jsx)(p,{className:"h-10 w-8 rounded-radius-md"}),(0,r.jsx)(p,{className:"h-10 w-8 rounded-radius-md"}),(0,r.jsx)(p,{className:"h-10 w-8 rounded-radius-md"}),(0,r.jsx)(p,{className:"h-10 w-8 rounded-radius-md"})]})},x=()=>(0,r.jsx)("div",{className:"flex w-full items-center space-x-2 overflow-hidden",children:Array.from({length:10}).map((e,t)=>(0,r.jsx)("div",{children:(0,r.jsx)(m,{})},"win-card-loader-".concat(t)))}),h=e=>{let{className:t,as:s}=e;return(0,r.jsx)(s||"div",{className:(0,a.cn)(["h-4 w-full rounded-lg bg-surface-subdued lg:w-32",t])})},v=e=>{let{className:t}=e;return(0,r.jsx)("div",{className:(0,a.cn)(["h-7 w-16 rounded-lg bg-surface-subdued",t])})},g=()=>(0,r.jsxs)(r.Fragment,{children:[(0,r.jsx)(h,{className:"mx-auto mb-2 h-7 lg:w-80"}),(0,r.jsx)(h,{className:"mx-auto h-7 lg:w-80"})]}),p=e=>{let{className:t}=e;return(0,r.jsx)("div",{className:(0,a.cn)(["h-4 w-full rounded-lg bg-surface-subdued lg:w-32 dark:bg-surface-default",t])})},j=()=>(0,r.jsx)("div",{className:"mb-5 grid grid-cols-3 gap-2  last:mb-0 sm:grid-cols-5 lg:grid-cols-8",children:Array.from(Array(16).keys()).map(e=>(0,r.jsx)(d,{},"games-scheleton-".concat(e)))}),w=()=>(0,r.jsx)("div",{className:"mb-5 grid grid-cols-3 gap-2 last:mb-0 sm:grid-cols-5 lg:grid-cols-8",children:Array.from({length:7}).map((e,t)=>(0,r.jsx)(d,{},t))}),b=()=>(0,r.jsxs)("div",{className:"flex flex-col space-y-4",children:[(0,r.jsx)(h,{className:"h-6 w-[80%] lg:w-[80%]"}),Array.from({length:5}).map((e,t)=>(0,r.jsx)(h,{className:"h-4 !w-[".concat((t+1)*10,"%] lg:w-[").concat((t+1)*10,"%]")},t))]}),y=e=>{let{...t}=e;return(0,r.jsxs)("div",{tw:"w-full",children:[(0,r.jsx)(h,{className:"mx-auto mb-1 h-6 md:mb-3 lg:w-24"}),(0,r.jsx)(h,{className:"mx-auto h-12 !w-1/2"})]})},N=()=>(0,r.jsxs)("div",{children:[(0,r.jsxs)("div",{className:"mb-4 grid grid-cols-4 justify-between gap-2 lg:flex",children:[(0,r.jsx)(h,{className:"h-4"}),(0,r.jsx)(h,{className:"h-4"}),(0,r.jsx)(h,{className:"h-4"}),(0,r.jsx)(h,{className:"h-4"})]}),(0,r.jsxs)("div",{children:[(0,r.jsx)(h,{className:"mb-1 h-11 w-full rounded-radius-md lg:w-full"}),(0,r.jsx)(h,{className:"mb-1 h-11 w-full rounded-radius-md opacity-50 lg:w-full"}),(0,r.jsx)(h,{className:"mb-1 h-11 w-full rounded-radius-md lg:w-full"}),(0,r.jsx)(h,{className:"mb-1 h-11 w-full rounded-radius-md opacity-50 lg:w-full"}),(0,r.jsx)(h,{className:"h-11 w-full rounded-radius-md lg:w-full"})]})]}),k=e=>{let{...t}=e;return(0,r.jsx)("div",{className:"mb-3 md:mb-7",...t,children:(0,r.jsx)(h,{className:"relative flex h-[12rem] min-w-[22.5rem] overflow-hidden rounded-3xl"})})},S=e=>{let{className:t,...s}=e;return(0,r.jsx)(h,{className:(0,a.cn)(["h-10 w-10 rounded-full lg:w-10",t]),...s})},F=()=>(0,r.jsxs)("div",{className:"flex flex-col",children:[(0,r.jsx)(h,{className:"mb-1 h-7 lg:w-10"}),(0,r.jsx)(h,{className:"mb-[1px] h-10 border border-transparent lg:w-full"})]}),C=()=>(0,r.jsxs)("div",{className:"flex h-16 w-full flex-col justify-between",children:[(0,r.jsx)(h,{className:"mb-0.5 h-4 w-20"}),(0,r.jsx)(h,{className:"h-10 lg:w-full"})]}),A=e=>{let{headers:t,tableRowProps:s}=e;return(0,r.jsx)(l.iA,{stylingOptions:{containerStyles:"p-0"},headers:Array.from({length:t}).map((e,t)=>(0,r.jsx)(h,{},t)),children:[void 0,void 0,void 0].map((e,a)=>(0,r.jsx)(l.SC,{className:s,children:Array.from({length:t}).map((e,t)=>(0,r.jsxs)(l.pj,{children:[" ",(0,r.jsx)(h,{})]},t))},a))})},_=()=>(0,r.jsxs)("div",{className:"flex flex-col",children:[(0,r.jsx)(h,{className:"mb-[9px] h-6 w-16 lg:w-16"}),(0,r.jsx)(h,{className:"h-10 lg:w-auto"})]}),I=()=>(0,r.jsxs)("div",{className:"flex flex-col space-y-7",children:[(0,r.jsxs)("div",{className:"flex flex-col space-y-4",children:[(0,r.jsx)(_,{}),(0,r.jsxs)("div",{children:[(0,r.jsx)(h,{className:"mb-1 w-16 lg:w-16"}),(0,r.jsx)(h,{className:"h-5 lg:w-auto"})]}),(0,r.jsx)(_,{}),(0,r.jsx)(_,{})]}),(0,r.jsx)(h,{className:"h-[18px] w-full lg:w-full"}),(0,r.jsx)(h,{className:"h-10 lg:w-full"})]}),O=e=>{let{className:t}=e;return(0,r.jsxs)("div",{className:(0,a.cn)(["relative z-0 flex flex-col rounded-2xl bg-bgr-subtile p-3",t]),children:[(0,r.jsxs)("div",{className:"mb-7 grid grid-cols-6 gap-4 sm:grid-cols-10",children:[(0,r.jsx)("div",{className:"relative col-span-3 h-56 overflow-hidden rounded-xl sm:col-span-3",children:(0,r.jsx)(h,{className:"h-full lg:w-auto"})}),(0,r.jsxs)("div",{className:"col-span-3 flex flex-col justify-center sm:col-span-7",children:[(0,r.jsx)(h,{className:"h-16"}),(0,r.jsx)(h,{className:"mb-3 h-7"}),(0,r.jsx)("div",{className:"flex flex-row items-center space-x-1",children:(0,r.jsx)(h,{})})]})]}),(0,r.jsx)(h,{className:"mb-3 h-10 w-full"}),(0,r.jsx)("div",{className:"flex justify-between space-x-2",children:(0,r.jsxs)("div",{className:"relative z-[0] flex w-full justify-between space-x-2",children:[(0,r.jsx)(h,{className:"h-10"}),(0,r.jsx)(h,{className:"h-10"})]})})]})},P=e=>{let{forPage:t}=e;return(0,r.jsx)("div",{className:(0,a.cn)(["grid w-full grid-cols-1  gap-2 md:grid-cols-2",t&&"grid grid-cols-1 gap-2 sm:grid-cols-2 sm:gap-4 lg:grid-cols-2 xl:grid-cols-3 "]),children:Array.from({length:9}).map((e,t)=>(0,r.jsx)("div",{children:(0,r.jsx)("div",{children:(0,r.jsxs)("div",{className:"wild-transition flex flex-row space-x-2.5 rounded-3xl bg-surface-default p-2 group-hover:-translate-y-1",children:[(0,r.jsx)("div",{children:(0,r.jsx)("div",{className:"relative h-[96px] w-[96px] shrink-0 overflow-hidden rounded-3xl",children:(0,r.jsx)(h,{className:"h-full w-full lg:w-full"})})}),(0,r.jsx)("div",{className:"flex-1",children:(0,r.jsxs)("div",{className:"flex h-full max-w-[17rem] flex-1 flex-col justify-between text-sm leading-4",children:[(0,r.jsxs)("div",{children:[(0,r.jsx)(h,{className:"mb-1 w-32"}),(0,r.jsx)(h,{className:"mb-1 w-32"}),(0,r.jsx)(h,{className:"w-32 "})]}),(0,r.jsx)(h,{className:"w-32"})]})})]})})},t))})},Z=()=>(0,r.jsxs)("div",{className:"flex flex-1 flex-row items-center justify-end space-x-2",children:[(0,r.jsx)(p,{className:"h-10 w-[84px] lg:w-[84px]"}),(0,r.jsx)(p,{className:"h-10 w-[84px] lg:w-[84px]"})]}),E=()=>(0,r.jsxs)("div",{className:"flex flex-col items-center justify-center lg:pt-4",children:[(0,r.jsxs)("div",{className:"mb-3",children:[(0,r.jsx)("div",{className:"flex items-center justify-center",children:(0,r.jsx)(h,{className:"h-[124px] w-[124px] lg:w-[124px]"})}),(0,r.jsx)(h,{className:"h-7"})]}),(0,r.jsxs)("div",{className:"w-full",children:[(0,r.jsx)(h,{className:"mb-1 h-6"}),(0,r.jsx)(h,{className:"mb-3 h-10"}),(0,r.jsx)(h,{className:"h-7"})]})]}),M=()=>(0,r.jsx)("div",{className:"flex flex-row space-x-2.5 overflow-hidden",children:Array.from({length:10}).map((e,t)=>(0,r.jsx)("div",{className:"h-[100px] w-[180px] shrink-0 rounded-xl bg-surface-subdued"},t))}),D=()=>(0,r.jsxs)(n.Z,{children:[(0,r.jsx)(h,{className:"mb-3 h-8 rounded-full"}),(0,r.jsx)(i.m,{})]}),T=()=>(0,r.jsxs)(r.Fragment,{children:[(0,r.jsx)(D,{}),(0,r.jsx)(D,{})]}),L=()=>(0,r.jsx)("div",{className:"relative h-[23.125rem] w-[16.875rem] shrink-0 overflow-hidden rounded-2xl bg-surface-default",children:(0,r.jsxs)("div",{className:"absolute inset-0 z-10 flex flex-col items-center justify-between p-3 !pb-7",children:[(0,r.jsxs)("div",{className:"flex w-full flex-col items-center",children:[(0,r.jsxs)("div",{className:(0,a.cn)(["relative flex w-full items-center justify-between"]),children:[(0,r.jsx)("div",{className:"flex flex-row",children:(0,r.jsx)(h,{className:"h-7 w-7 lg:h-7 lg:w-7"})}),(0,r.jsx)(h,{className:"lg:-w-4 h-4 w-4 lg:h-4"})]}),(0,r.jsx)(h,{className:"mx-auto mb-2 h-16 w-16 lg:h-16 lg:w-16"}),(0,r.jsx)(h,{}),(0,r.jsx)(h,{className:"mb-9"}),(0,r.jsx)(h,{className:"h-[72px]"})]}),(0,r.jsx)(h,{className:"mx-auto h-10"})]})}),G=()=>{let{darkMode:e}=(0,u.Z)();return(0,r.jsxs)("div",{className:"relative flex flex-col items-center justify-center overflow-hidden rounded-2xl bg-[#FCFCFC] p-3 pt-4 md:min-w-[267px] dark:bg-[#263747]",children:[(0,r.jsx)(c.default,{className:"pointer-events-none",src:"/assets/bonus-shop/card-background/fs".concat(e?"-dark":"",".png"),fill:!0,alt:"Card background loader",style:{objectFit:"cover"}}),(0,r.jsxs)("div",{className:"relative z-10 flex w-full flex-col items-center text-center",children:[(0,r.jsx)(c.default,{className:"mb-1",src:"/assets/bonus-shop/fs-icon.svg",width:96,height:96,alt:"Free spins icon loader"}),(0,r.jsx)(h,{className:"mb-4 flex h-[28px] w-32 flex-row items-center space-x-1 text-xl font-bold"}),(0,r.jsx)("div",{className:"mb-3 flex w-full flex-col space-y-0.5",children:[1,2,3].map((e,t)=>(0,r.jsx)(l.ns,{stylingOptions:{containerStyles:(0,a.cn)(["!w-full bg-surface-subdued h-8 hover:bg-surface-subdued "]),valueStyles:"!py-[9px] text-right whitespace-nowrap  flex justify-end",labelStyles:"!py-[9px] whitespace-nowrap"},value:(0,r.jsx)(h,{}),label:(0,r.jsx)(h,{})},t))}),(0,r.jsx)(h,{className:"h-8 w-full lg:w-full"})]})]})},U=()=>(0,r.jsxs)("div",{className:"order-2 flex w-full max-w-[43.75rem] flex-col space-y-1 lg:order-1",children:[(0,r.jsx)(h,{className:"h-12 w-full lg:w-4/5",as:"span"}),(0,r.jsx)(h,{className:"h-12 w-full  lg:w-full",as:"span"}),(0,r.jsx)(h,{className:"h-[30px] w-full lg:h-10 lg:w-2/3",as:"span"}),(0,r.jsx)(h,{className:"h-[30px] w-full  lg:h-10 lg:w-1/2",as:"span"})]})},99670:function(e,t,s){"use strict";var r=s(57437);s(2265),t.Z=e=>{let{...t}=e;return(0,r.jsx)("div",{children:(0,r.jsxs)("svg",{className:"animate-spin text-deepBlue-dark40 dark:(text-white) mb-1 mr-3 h-5 w-5",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24",...t,children:[(0,r.jsx)("circle",{className:"opacity-25",cx:"12",cy:"12",r:"10",stroke:"currentColor",strokeWidth:"4"}),(0,r.jsx)("path",{className:"opacity-75",fill:"currentColor",d:"M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"}),(0,r.jsx)("path",{className:"dark:(text-white) fill-current text-text-default opacity-80",fill:"currentColor",d:"M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"})]})})}},99611:function(e,t,s){"use strict";s.d(t,{$E:function(){return u},_V:function(){return c},d9:function(){return n}});var r=s(73667),l=s(27504),a=s(61413);let n=()=>(0,r.useQuery)({queryKey:["wild-categories"],queryFn:()=>(0,l.ZP)("games/collections").then(function(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];return null==e?void 0:e.filter(e=>a.Z.SHOWN_WILD_CATEGORIES.includes(e.id))})}),i=["_hd","not_slots"],c=()=>(0,r.useQuery)({queryKey:["all-wild-categories"],queryFn:()=>(0,l.ZP)("games/collections").then(function(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];return null==e?void 0:e.filter(e=>!i.includes(e.id))})}),u=()=>(0,r.useQuery)({queryKey:["wild-collections"],queryFn:()=>(0,l.ZP)("games/collections").then(function(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];return e.filter(e=>a.Z.SHOWN_WILD_COLLECTIONS.includes(e.id)).sort((e,t)=>a.Z.SHOWN_WILD_COLLECTIONS.indexOf(e.id)-a.Z.SHOWN_WILD_COLLECTIONS.indexOf(t.id))})})},47458:function(e,t,s){"use strict";var r=s(91774),l=s(2265);t.Z=()=>{let[e,t]=(0,l.useState)(!1),{setTheme:s,theme:a,forcedTheme:n}=(0,r.F)();return(0,l.useEffect)(()=>{t(!0)},[]),{mounted:e,setDarkMode:s,darkMode:(0,l.useMemo)(()=>"dark"===n,[n])}}},78267:function(e,t,s){"use strict";s.d(t,{WK:function(){return h},bO:function(){return x},fp:function(){return g}});var r=s(2265),l=s(47082),a=s(20568),n=s(73667),i=s(6984),c=s(27504),u=s(1785),o=s(16484),d=s(44683),m=s(95285),f=s(4249);let x=()=>{let e=(0,m.J)(),{toast:t}=(0,o.useToast)(),s=(0,l.useQueryClient)(),{track:r}=(0,f.z)();return(0,a.useMutation)({mutationKey:["addToFavorites"],mutationFn:e=>{let{gameID:t,completeGame:s}=e;return(0,c.ZP)("player/favorite_games/".concat(t),{},"PUT").then(e=>(r("game_favorite_added",{category:"user",label:t}),e))},retry:!1,onMutate:async e=>{let{gameID:t,completeGame:r}=e;await s.cancelQueries({queryKey:["favoriteGames"]});let l=s.getQueryData(["favoriteGames"]);return s.setQueryData(["favoriteGames"],e=>[...e,r]),{prevFavoriteData:l}},onError:(r,l,a)=>{s.setQueryData(["favoriteGames"],a.prevFavoriteData),t({state:"error",title:null==e?void 0:e.favorites_auth_error})},onSettled:()=>{s.invalidateQueries({queryKey:["favoriteGames"]}),t({state:"success",title:null==e?void 0:e.favorites_success})}})},h=()=>{let{t:e}=(0,d.useTranslation)(),t=(0,m.J)(),{toast:s}=(0,o.useToast)(),r=(0,l.useQueryClient)();return(0,a.useMutation)({mutationKey:["removeFromFavorites"],mutationFn:e=>{let{gameID:t,completeGame:s}=e;return(0,c.ZP)("player/favorite_games/".concat(t),{},"DELETE")},retry:!1,onMutate:async e=>{let{gameID:t,completeGame:s}=e;await r.cancelQueries({queryKey:["favoriteGames"]});let l=r.getQueryData(["favoriteGames"]);return r.setQueryData(["favoriteGames"],e=>e.filter(e=>e.identifier!==(null==s?void 0:s.identifier))),{prevFavoriteData:l}},onError:e=>{r.setQueryData(["favoriteGames"],e.prevFavoriteData),s({state:"error",title:null==t?void 0:t.favorites_general_error})},onSettled:e=>{r.invalidateQueries({queryKey:["favoriteGames",null==e?void 0:e.gameId]}),s({state:"success",title:null==t?void 0:t.favorites_removed})}})},v=()=>{let{user:{currentUser:e,isLoading:t}}=(0,i.useAuth)();return(0,n.useQuery)({queryKey:["favoriteGames"],queryFn:async()=>{try{return await (0,c.ZP)("player/favorite_games",{isV2:!0})}catch(e){if(e&&401===e.code)return[]}},enabled:!t&&null!=e&&!!e.email})},g=()=>{let{data:e=[],isLoading:t,isPending:s}=v(),l=(0,r.useMemo)(()=>(null==e?void 0:e.length)>0?null==e?void 0:e.map(e=>null==e?void 0:e.identifier):[],[e]),{data:a}=(0,u.JI)({game_ids:[...l]},{enabled:(null==l?void 0:l.length)>0});return{favoriteIdsAndIdentifiers:(0,r.useMemo)(()=>null==a?void 0:a.map(e=>({id:e.id,identifier:e.identifier,slug:e.slug})),[a]),favoriteGameIdentifiers:l,favoritesLoading:t,favoritesPending:s,completeGamesPending:s,completeGames:e,completeGamesLoading:t}}},1785:function(e,t,s){"use strict";s.d(t,{JI:function(){return o},Np:function(){return c}});var r=s(73667);s(98539);var l=s(6984),a=s(98274),n=s(27504),i=s(976);let c=async function(e){let t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"BTC",s=a.isMobile?"mobile":"desktop";try{let r=await (0,n.ZP)("games_filter",{...e,device:s},"POST",{Accept:"application/vnd.s.v2+json"});return{...r,data:(0,i.bG)(r.data,t)}}catch(e){console.log(e)}},u=async(e,t)=>{let s=a.isMobile?"mobile":"desktop";try{let r=await (0,n.ZP)("games_filter/select",{...e,device:s},"POST",{Accept:"application/vnd.s.v2+json"}),l=Object.keys(r).map(e=>r[e]);return(0,i.bG)(l,t)}catch(e){console.log(e)}},o=function(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},{user:s}=(0,l.useAuth)(),n=a.isMobile?"mobile":"desktop";return(0,r.useQuery)({queryKey:["filteredGamesByIds",{...e,device:n}],queryFn:e=>{var t,r;let{queryKey:l}=e;return u(l[1],null==s?void 0:null===(r=s.currentUser)||void 0===r?void 0:null===(t=r.currency)||void 0===t?void 0:t.toUpperCase())},...t})}},70865:function(e,t,s){"use strict";s.d(t,{V:function(){return i}});var r=s(62696),l=s(46063),a=s(1785),n=s(6984);let i=function(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},{user:s}=(0,n.useAuth)();return(0,r.useInfiniteQuery)({initialPageParam:0,queryKey:["infiniteFilteredGames",e],queryFn:e=>{var t,r,l;let{queryKey:n,pageParam:i}=e,c=n[1]||{};return(0,a.Np)({...c,...i},(null==s?void 0:null===(t=s.currentUser)||void 0===t?void 0:t.currency)?null==s?void 0:null===(l=s.currentUser)||void 0===l?void 0:null===(r=l.currency)||void 0===r?void 0:r.toUpperCase():void 0).then(e=>e)},placeholderData:l.Wk,getPreviousPageParam:(t,s)=>{var r,l,a;if((null==t?void 0:null===(r=t.data)||void 0===r?void 0:r.length)!==0&&(null==t?void 0:null===(l=t.pagination)||void 0===l?void 0:l.prev_page))return{...e,page:null==t?void 0:null===(a=t.pagination)||void 0===a?void 0:a.prev_page}},getNextPageParam:(t,s)=>{var r,l,a;if((null==t?void 0:null===(r=t.data)||void 0===r?void 0:r.length)!==0&&(null==t?void 0:null===(l=t.pagination)||void 0===l?void 0:l.next_page))return{...e,page:null==t?void 0:null===(a=t.pagination)||void 0===a?void 0:a.next_page}},refetchOnMount:!1,...t})}},29808:function(e,t,s){"use strict";var r=s(71626);t.Z=e=>{let{data:t,isPending:s}=(0,r.Z)();return e?{isRestricted:(null==t?void 0:t.some(t=>e.includes("pragmatic")?t.includes("pragmatic"):t.includes(e)))||!1,isPending:s}:{isRestricted:!1,isPending:s}}},976:function(e,t,s){"use strict";s.d(t,{bG:function(){return r}}),s(45596);let r=(e,t)=>e.map(e=>{var s,r,l;let{identifier:a,title:n,provider:i}=e,c=null==e?void 0:e.seo_title,u={...e,slug:c};return u.id=(null==e?void 0:e.currencies.FUN)?null==e?void 0:null===(s=e.currencies.FUN)||void 0===s?void 0:s.id:t&&(null==e?void 0:e.currencies[t])?null==e?void 0:null===(r=e.currencies[t])||void 0===r?void 0:r.id:null==e?void 0:null===(l=e.currencies[Object.keys(null==e?void 0:e.currencies)[0]])||void 0===l?void 0:l.id,u.currencies=Object.keys(null==e?void 0:e.currencies).reduce((t,s)=>(t[s]=null==e?void 0:e.currencies[s].id,t),{})||{},{identifier:a,...u}})},71626:function(e,t,s){"use strict";var r=s(73667),l=s(27504);t.Z=()=>(0,r.useQuery)({queryKey:["marks"],queryFn:()=>(0,l.ZP)("restrictions/marks"),retry:!1,refetchOnMount:!1})},97647:function(e,t,s){"use strict";s.d(t,{B2:function(){return a},Lf:function(){return n},h7:function(){return i}});var r=s(47907),l=s(2265);let a=(e,t)=>{let s=new URLSearchParams;return s.set(e,t),s.toString()},n=()=>(0,r.useSearchParams)().get("m"),i=(e,t)=>{let s="".concat(a("m",e));t&&Object.keys(t).forEach(e=>{s+="&".concat(a(e,t[e]))}),window.history.pushState(null,"","?".concat(s))};t.ZP=()=>{let e=(0,r.usePathname)(),t=(0,r.useSearchParams)(),s=(0,l.useCallback)(s=>{let r=new URLSearchParams(null==t?void 0:t.toString());if(r.delete("m"),s)for(let e of s)r.has(e)&&r.delete(e);let l=r.toString();window.history.replaceState(null,"","".concat(e).concat(l?"?".concat(l):""))},[e,t]),a=(0,l.useCallback)(s=>{let r=new URLSearchParams(null==t?void 0:t.toString());if(s)for(let e of s)r.has(e)&&r.delete(e);let l=r.toString();window.history.replaceState(null,"","".concat(e).concat(l?"?".concat(l):""))},[e,t]);return{open:i,close:s,replace:(0,l.useCallback)((s,r)=>{let l=new URLSearchParams(t.toString());l.set(s,r);let a=l.toString();window.history.replaceState(null,"","".concat(e).concat(a?"?".concat(a):""))},[e,t]),create:(0,l.useCallback)((s,r)=>{let l=new URLSearchParams(null==t?void 0:t.toString());l.append(s,r);let a=l.toString();window.history.replaceState(null,"","".concat(e).concat(a?"?".concat(a):""))},[e,t]),closeOnly:a}}},10834:function(e,t,s){"use strict";var r=s(6984);t.Z=e=>{let{user:{currentUser:t}}=(0,r.useAuth)();return!!e&&"evolution"===e&&null===((null==t?void 0:t.first_name)&&(null==t?void 0:t.last_name)&&(null==t?void 0:t.country))}},68381:function(e,t,s){"use strict";s.d(t,{kx:function(){return w},B2:function(){return n},FM:function(){return g},lJ:function(){return b},dk:function(){return o},qw:function(){return m},IQ:function(){return u},oU:function(){return i},Tm:function(){return j},$A:function(){return p},YD:function(){return h},Cp:function(){return v},S3:function(){return x},Yt:function(){return f}});var r=s(57437);s(2265);var l=s(87306),a=s(20703);let n=(e,t,s)=>{let r=new URLSearchParams(s);return r.set(e,t),r.toString()},i=function(e){let{small:t=!1}=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};switch(e){case"btc":return(0,r.jsx)(a.default,{src:"/assets/accounts/BTC.svg",width:t?12:16,height:t?12:16,alt:"BTC Icon"});case"bnb":return(0,r.jsx)(a.default,{src:"/assets/accounts/BNB.svg",width:t?12:16,height:t?12:16,alt:"BNB Icon"});case"usd":return(0,r.jsx)(a.default,{src:"/assets/accounts/USD.svg",width:t?12:16,height:t?12:16,alt:"USD Icon"});case"ada":return(0,r.jsx)(a.default,{src:"/assets/accounts/ADA.svg",width:t?12:16,height:t?12:16,alt:"ADA Icon"});case"trx":return(0,r.jsx)(a.default,{src:"/assets/accounts/TRX.svg",width:t?12:16,height:t?12:16,alt:"TRX Icon"});case"eur":return(0,r.jsx)(a.default,{src:"/assets/accounts/EUR.svg",width:t?12:16,height:t?12:16,alt:"EUR Icon"});case"eth":return(0,r.jsx)(a.default,{src:"/assets/accounts/ETH.svg",width:t?12:16,height:t?12:16,alt:"ETH Icon"});case"ltc":return(0,r.jsx)(a.default,{src:"/assets/accounts/LTC.svg",width:t?12:16,height:t?12:16,alt:"LTC Icon"});case"bch":return(0,r.jsx)(a.default,{src:"/assets/accounts/BCH.svg",width:t?12:16,height:t?12:16,alt:"BCH Icon"});case"dog":return(0,r.jsx)(a.default,{src:"/assets/accounts/DOGE.svg",width:t?12:16,height:t?12:16,alt:"DOGE Icon"});case"usdt":return(0,r.jsx)(a.default,{src:"/assets/accounts/USDT.svg",width:t?12:16,height:t?12:16,alt:"USDT Icon"});case"xrp":return(0,r.jsx)(a.default,{src:"/assets/accounts/XRP.svg",width:t?12:16,height:t?12:16,alt:"XRP Icon"});case"sol":return(0,r.jsx)(a.default,{src:"/assets/accounts/SOL.svg",width:t?12:16,height:t?12:16,alt:"SOL Icon"});default:return null}},c=e=>{let t={slots:"slot-games","table-games":"table-games-new",roulette:"roulette",jackpot:"jackpot-new","jackpot-games":"jackpot-new","bonus-buy":"bonus-buy",providers:"providers",recommended:"crowns",popular:"popular-games",new:"new-games",recent:"recently-played",favorites:"favorite-games",loyalty:"star-chest",cashback:"coin-wallet",contact:"cherries",live:"live",prize:"prize-icon",help:"help",settings:"settings-icon",search:"search",tournaments:"tournaments",loyalty2:"loyalty-yellow",promotions:"promotions",skill:"skill-games-simple",default:"all-games-new","easter-rush":"easter-rush",blackjack:"blackjack",chat:"chat",support:"support",lobby:"icon_lobby",latest:"latest",megaways:"icon_megaways",collections:"icon_collections",all:"all_games"};return t[e]||t.default},u=function(e){let t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"large",s={extraSmall:{width:16,height:16},small:{width:20,height:20},large:{width:32,height:32}},{width:l,height:n}=s[t]||s.large;return(0,r.jsx)(a.default,{width:l,height:n,src:"assets/category-icons/".concat(c(e),".svg"),alt:"img-".concat(e),className:"object-contain"})},o=e=>{switch(e){case"btc":return"background: #F89A2A;";case"eth":return"background: #7748FA;";case"ltc":return"background: #3572D1;";case"bch":return"background: #0AC18E;";case"dog":return"background: #BA9F33;";case"neo":return"background: #00DE94;";case"usdt":return"background: #50AF95;";case"usd":return"background: #6cde07;";case"eur":return"background: #0f8ff8;";case"ada":return"background: #4FAF95;";case"bnb":return"background: #F3BA2F;";case"xrp":return"background: #21692E;";case"trx":return"background: #EF0027;";default:return"background: #222222;"}},d={0:"sunday",1:"monday",2:"tuesday",3:"wednesday",4:"thursday",5:"friday",6:"saturday",7:"sunday"},m=e=>e>=0&&e<=6?d[e]:"Invalid day of the week.",f=function(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null,s=arguments.length>2&&void 0!==arguments[2]&&arguments[2];if(null==e)return;t&&(null==t?void 0:t.markedOptions)&&(0,l.Ov)(t.markedOptions);let r=(0,l.cV)(e),a=(0,l.E2)(r);return s&&(a=(0,l.DN)(e)),a},x=(e,t)=>{let s=e&&e[t];if(s)return Object.values(s)[0]},h=e=>{let t=[];if(e&&e.errors)for(let s in e.errors)Array.isArray(e.errors[s])&&t.push(...e.errors[s]);return t},v=function(e,t){let s=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{},r=arguments.length>3&&void 0!==arguments[3]?arguments[3]:()=>null,l=e.target;r({...s,[t]:l.value})},g=e=>{let t=e.split(" "),s=t[0],l=t[1];return(0,r.jsxs)(r.Fragment,{children:[(0,r.jsx)("span",{className:"text-sm font-semibold text-base-secondary",children:s})," ",(0,r.jsx)("span",{className:"text-sm font-semibold text-text-default",children:l})]})},p=(e,t)=>{if(!e||0===e.length||!e||!t)return[];let s=Array(t),r=e.length,l=Array(r);if(t>r)throw RangeError("getRandom: more elements taken than available");for(;t--;){let a=Math.floor(Math.random()*r);s[t]=e[a in l?l[a]:a],l[a]=--r in l?l[r]:r}return s},j=(e,t,s)=>{let l=(()=>{switch(e){case"slots":return"Slots2";case"table-games":return"billiards";case"roulette":return"roulette-page";case"jackpot":return"seven";case"bonus-buy":return"cocktail";case"providers":return"providers-page";case"recommended":return"providers";case"popular":return"horseshoe";case"new":case"fresh-releases":return"new-games";case"recent":return"timer";case"skill-games":return"skill-games";case"favorites":return"favorite";case"loyalty":return"star-chest";case"cashback":return"coin-wallet";case"contact":return"cherries";case"live-casino":case"all-games":return"controller";case"promotions":return"lightning";case"blackjack":return"blackjack";case"top-games":return"top-games";case"tournaments":return"cup1";case"settings":return"settings";case"megaways":return"megaways";default:return"all-games"}})();return(0,r.jsx)(a.default,{alt:"image ".concat(e),height:t||32,width:s||32,src:"assets/page-icons/".concat(l,".svg")})},w=e=>e?e.charAt(0).toUpperCase()+e.slice(1):"",b=function(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:6,t="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",s="";for(let r=0,l=t.length;r<e;++r)s+=t.charAt(Math.floor(Math.random()*l)).toUpperCase();return s}},90247:function(){},78135:function(){}}]);