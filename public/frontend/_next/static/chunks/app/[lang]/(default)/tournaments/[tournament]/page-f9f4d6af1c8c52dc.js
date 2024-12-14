(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[349,532,2203],{25333:function(e,t,n){"use strict";var l,i=n(52846);function r(){return(r=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var l in n)({}).hasOwnProperty.call(n,l)&&(e[l]=n[l])}return e}).apply(null,arguments)}t.Z=function(e){return i.createElement("svg",r({xmlns:"http://www.w3.org/2000/svg",fill:"current",viewBox:"0 0 16 16"},e),l||(l=i.createElement("path",{d:"M11.334 14.01a.833.833 0 0 1-1.18 0l-5.54-5.54a.664.664 0 0 1 0-.94l5.54-5.54a.833.833 0 0 1 1.18 0 .833.833 0 0 1 0 1.18L6.508 8.003l4.833 4.834a.83.83 0 0 1-.007 1.173"})))}},65745:function(e,t,n){Promise.resolve().then(n.bind(n,15574)),Promise.resolve().then(n.bind(n,22960)),Promise.resolve().then(n.bind(n,47082)),Promise.resolve().then(n.bind(n,39098)),Promise.resolve().then(n.bind(n,62696)),Promise.resolve().then(n.bind(n,69939)),Promise.resolve().then(n.bind(n,20568)),Promise.resolve().then(n.bind(n,53182)),Promise.resolve().then(n.bind(n,66906)),Promise.resolve().then(n.bind(n,73667)),Promise.resolve().then(n.bind(n,83158)),Promise.resolve().then(n.bind(n,34239)),Promise.resolve().then(n.bind(n,96902)),Promise.resolve().then(n.bind(n,44683)),Promise.resolve().then(n.bind(n,71824))},71824:function(e,t,n){"use strict";n.r(t),n.d(t,{default:function(){return I}});var l=n(57437),i=n(2265),r=n(10435),o=n(8792),a=n(20208),s=n(25333),d=n(44683),u=()=>{let{t:e}=(0,d.useTranslation)(),t=e("tournaments");return(0,l.jsx)(o.default,{passHref:!0,href:"/tournaments",children:(0,l.jsxs)("div",{className:(0,a.cn)(["group","svg:text-text-default relative z-50 mb-3 mt-3 inline-flex transform items-center space-x-1 py-2 text-text-default  hover:text-text-subdued lg:mb-8 [&>svg]:fill-current hover:[&>svg]:text-text-subdued"]),children:[(0,l.jsx)(s.Z,{className:"h-4 w-4 fill-current text-text-subdued"}),(0,l.jsx)("h2",{className:(0,a.cn)(["transform text-lg font-semibold leading-6 text-text-default group-hover:text-text-subdued"]),children:null==t?void 0:t.heading_left})]})})},c=n(54677),v=n(20703),m=n(83406),x=n(3254),h=n(27553),f=n(21934),g=n(63277),p=n(86007),b=n(64758),y=n(16484),j=n(17891),_=n(20673),w=n(1005);let N=(e,t)=>{let{t:n}=(0,d.useTranslation)(),{data:l}=(0,_.en)(null==e?void 0:e.id),{data:r}=(0,w.jg)(),o=n("tournaments");return{players:(0,i.useMemo)(()=>{var n;return null==e?void 0:null===(n=e.top_players)||void 0===n?void 0:n.slice(0,t).map(e=>({nickname:null==e?void 0:e.nickname,wins:null==e?void 0:e.win_cents,rate:null==e?void 0:e.rate,bet_cents:null==e?void 0:e.bet_cents}))},[null==e?void 0:e.top_players,t]),sortedPrizes:(0,i.useMemo)(()=>(null==e?void 0:e.prizes)?e.prizes.sort((e,t)=>e.award_place-t.award_place):[],[null==e?void 0:e.prizes]),currency:(0,i.useMemo)(()=>r.find(t=>t.code===(null==e?void 0:e.currency)),[r,null==e?void 0:e.currency]),playerTournamentStatus:l,tournamentContent:o}};var P=e=>{var t,n,r,o,a;let{tournament:s}=e,{t:u}=(0,d.useTranslation)(),{matchesQuery:c,isLoading:m}=(0,b.ZP)(b.bK),x=null==s?void 0:null===(t=s.frontend_identifier)||void 0===t?void 0:t.includes("dynamic"),[h,_]=(0,i.useState)(10),{top_players:w,prizes:P}=s||{},{players:Z,sortedPrizes:S,currency:L,playerTournamentStatus:A,tournamentContent:M}=N(s,h),z=null==M?void 0:null===(n=M.tournament_item)||void 0===n?void 0:n.table_header,O=(null==P?void 0:P.length)<=h,k=null==Z?void 0:Z.sort((e,t)=>t.rate-e.rate),C=(null==s?void 0:s.strategy)==="rate",T=null==s?void 0:null===(r=s.frontend_identifier)||void 0===r?void 0:r.includes("compoint"),{formatCurrency:E}=(0,y.useCurrencyFormatter)(),I=(0,i.useMemo)(()=>Array.from({length:h},(e,t)=>{var n,i,r,o,a,d,u,h,b,y;let _;_=t<3?(0,l.jsx)("div",{className:"flex shrink-0 items-center",children:(0,l.jsx)(v.default,{width:24,height:24,src:"assets/tournament-prizes/cup".concat(t+1,".svg"),alt:"Prize cup ".concat(t+1)})}):(0,l.jsx)("div",{className:"flex h-7 w-7 items-center justify-center",children:"".concat(t+1)});let w=(null==A?void 0:A.award_place)===t+1,N=Z&&Z[t],P=[(0,l.jsx)(f.pj,{children:(0,l.jsx)("div",{className:"flex items-center",children:_})},"cell1-".concat(t)),(0,l.jsx)(f.pj,{children:(0,l.jsxs)("div",{className:"flex flex-row items-center space-x-2",children:[(0,l.jsx)("div",{className:"flex flex-col",children:(0,l.jsx)("div",{children:(null==N?void 0:N.nickname)||"Player"})}),w&&(0,l.jsx)("div",{className:"rounded-lg bg-indigo-600/10 px-1.5 py-0.5 text-sm uppercase leading-4 text-indigo-600",children:null==M?void 0:null===(n=M.tournament_item)||void 0===n?void 0:n.found_player})]})},"cell2-".concat(t)),c&&!m&&(0,l.jsx)(f.pj,{children:Z&&(null===(i=Z[t])||void 0===i?void 0:i.bet_cents)?(0,l.jsx)(g.Z,{className:"whitespace-nowrap",value:null===(r=Z[t])||void 0===r?void 0:r.bet_cents,currency:null==s?void 0:s.currency}):"N/A"},"cell3-".concat(t)),C&&(0,l.jsx)(f.pj,{children:(0,l.jsxs)("div",{className:"whitespace-nowrap",children:[" ",C?(null===(o=k[t])||void 0===o?void 0:o.rate)?"".concat(null===(a=k[t])||void 0===a?void 0:a.rate.toFixed(2),"x"):"N/A":Z&&(null===(d=Z[t])||void 0===d?void 0:d.bet_cents)?"".concat(E(Number(null===(u=Z[t])||void 0===u?void 0:u.bet_cents),null==L?void 0:L.code)):"N/A"]})},"cell4-".concat(t)),(0,l.jsx)(f.pj,{className:"whitespace-nowrap [&>span]:justify-end",children:T?(0,l.jsxs)("div",{className:"flex items-center justify-end space-x-1",children:[(0,l.jsx)("span",{children:function(e){if(e<1e3)return e.toString();let t=Math.floor(e/1e3),n=e%1e3;return 0===n?"".concat(t,"k"):"".concat(t,",").concat(Math.floor(n/100)/10,"k")}(null===(h=S[t])||void 0===h?void 0:h.chargeable_comp_points)}),(0,l.jsx)(j.K,{})]}):x?(0,l.jsx)(g.Z,{forPrize:!0,value:null===(y=function(e){let{prizes:t,money_prize_pool_cents:n,currency:l}=e;return t.map(e=>{let t=e.money_budget_percent/100*n;return{award_place:e.award_place,money_budget_percent:e.money_budget_percent,prizeSum:t,currency:l}})}(s))||void 0===y?void 0:null===(b=y[t])||void 0===b?void 0:b.prizeSum,currency:null==s?void 0:s.currency}):(0,p.LS)(S,t,s,L)},"cell5-".concat(t))];return(0,l.jsx)(f.SC,{className:"h-12",children:P},"row-".concat(t))}),[h,null==A?void 0:A.award_place,Z,null==M?void 0:null===(o=M.tournament_item)||void 0===o?void 0:o.found_player,c,m,s,C,k,E,L,T,S,x]),K=(0,i.useMemo)(()=>["#",z.th1,z.th2,z.th3,z.th4],[z]),F=(0,i.useMemo)(()=>{let e=[...K];return C||(e=e.filter((e,t)=>3!==t)),c||(e=e.filter((e,t)=>2!==t)),e},[K,C,c]);return(0,l.jsxs)("div",{className:"relative",children:[(0,l.jsx)(f.iA,{stylingOptions:{tableStyles:"",containerStyles:"p-0 hide-scroll-wrapper mb-4 lg:mb-7",headerStyles:"bg-[#edf0f2] dark:bg-[#0a1c2d] relative z-[50] uppercase"},headers:F,children:I}),!O&&(0,l.jsx)(f.zx,{onClick:()=>_(e=>e+5),color:"tertiary",className:"mx-auto",children:null===(a=M.actions)||void 0===a?void 0:a.load})]})},Z=n(47907),S=n(62337),L=n(43285),A=()=>{let{t:e}=(0,L.$G)(),t=(0,i.useMemo)(()=>e&&e("tournaments")?e("tournaments"):{leaderboard_title:"Leaderboard"},[e]);return(0,l.jsx)(f.xv,{size:"xl",className:"mb-4 font-semibold lg:mb-7",children:null==t?void 0:t.leaderboard_title})},M=n(61413),z=n(35829),O=n(79436),k=n(99611),C=n(23318),T=n(4009),E=n(94708),I=()=>{var e,t,n,o,a,s,f,g;let{t:p}=(0,d.useTranslation)(),y=p("homepage"),j=p("tournaments"),w=(0,Z.useParams)(),N=null==w?void 0:w.tournament,{data:L}=(0,_.vZ)(N),{data:I}=(0,S.oU)(),{matchesQuery:K}=(0,b.ZP)(b.bK),F=null==L?void 0:L.tournament,q=(0,i.useMemo)(()=>{var e,t;return null==I?void 0:null===(t=I.tournaments)||void 0===t?void 0:null===(e=t.data.find(e=>{var t;return e.attributes.uid===(null==L?void 0:null===(t=L.tournament)||void 0===t?void 0:t.frontend_identifier)}))||void 0===e?void 0:e.attributes},[null==I?void 0:null===(e=I.tournaments)||void 0===e?void 0:e.data,null==L?void 0:null===(t=L.tournament)||void 0===t?void 0:t.frontend_identifier]),B=(0,i.useMemo)(()=>{var e,t,n;return null==q?void 0:null===(n=q.thumbnail)||void 0===n?void 0:null===(t=n.tournament_image)||void 0===t?void 0:null===(e=t.data[0])||void 0===e?void 0:e.attributes.url},[null==q?void 0:null===(o=q.thumbnail)||void 0===o?void 0:null===(n=o.tournament_image)||void 0===n?void 0:n.data]),H=null===M.Z||void 0===M.Z?void 0:null===(a=M.Z.ALL_AVAILABLE_COLLECTIONS)||void 0===a?void 0:a.includes(null==F?void 0:F.game_category_identity),Q=H&&(null===M.Z||void 0===M.Z?void 0:null===(s=M.Z.ALL_AVAILABLE_COLLECTIONS)||void 0===s?void 0:s.find(e=>e===(null==F?void 0:F.game_category_identity))),{data:V,isLoading:D}=(0,k._V)(),R=(0,i.useMemo)(()=>{if(V)return null==V?void 0:V.reduce(function(e,t){return e[null==t?void 0:t.id]=null==t?void 0:t.games_count,e},{})},[V]),G=(0,E.w)({attributes:q});return(0,l.jsx)(r.Z,{children:(0,l.jsxs)("div",{className:"mx-auto max-w-3xl",children:[(0,l.jsx)(u,{}),(0,l.jsxs)("div",{className:"relative mb-1 flex aspect-[2/1] items-end overflow-hidden rounded-2xl p-3 lg:p-7",children:[(0,l.jsx)("div",{className:"absolute bottom-0 left-0 right-0 z-20 h-40 bg-gradient-to-t from-bgr-lighter to-transparent"}),F&&(0,l.jsx)(c.Z,{className:"lg:left-7 lg:top-7",tournament:F}),F&&(0,l.jsx)(v.default,{quality:100,fill:!0,alt:"Tournament Image",src:"".concat(m.Qc).concat(B),style:{objectFit:"cover",objectPosition:K?"left":""}})]}),(0,l.jsxs)("div",{className:"mb-7 flex flex-col  rounded-2xl bg-bgr-lightest p-3 md:mb-10 lg:min-h-16 lg:bg-bgr-lighter",children:[(0,l.jsx)(x.Z,{forDynamicRoute:!0,matchingTournament:q,tournament:F}),(0,l.jsx)(h.Z,{className:"lg:hidden",forDynamicRoute:!0,tournament:F})]}),D?(0,l.jsx)(T.TN,{}):H&&R[null==F?void 0:F.game_category_identity]&&(0,l.jsx)(z.Z,{className:"md:!mb-10",titleStyles:"mb-0",title:null==j?void 0:j.carousel_title,href:(null==F?void 0:F.game_category_identity)==="all"?"/games":Q?"/categories/".concat(Q):"/games",trailingElement:(0,l.jsx)(O.Z,{text:null==y?void 0:null===(g=y.casino)||void 0===g?void 0:null===(f=g.action)||void 0===f?void 0:f.btn_label,gamesCount:R&&R[null==F?void 0:F.game_category_identity],href:(null==F?void 0:F.game_category_identity)==="all"?"/games":Q?"/categories/".concat(Q):"/games"}),icon:(0,l.jsx)(v.default,{src:"/assets/category-icons/controller.svg",fill:!0,alt:"Categories New icon"}),children:(0,l.jsx)(C.Z,{tagType:"primary",tagText:"new",identifier:null==F?void 0:F.game_category_identity})}),(0,l.jsx)(A,{}),(0,l.jsx)(P,{tournament:null==L?void 0:L.tournament}),G&&(null==G?void 0:G.length)>0&&(0,l.jsx)("div",{className:"flex-start relative inline-flex w-full flex-col justify-start gap-4",children:null==G?void 0:G.map(e=>e)})]})})}},17891:function(e,t,n){"use strict";n.d(t,{K:function(){return d}});var l=n(57437),i=n(88942),r=n(2265),o=n(24105),a=n(21934),s=n(20703);let d=e=>{let{size:t=20,className:n}=e;return(0,l.jsx)(s.default,{alt:"Wild Point Icon",src:"/assets/wild-coin.svg",width:t,height:t,className:n})},u=e=>{let{text:t}=e;return(0,l.jsxs)("div",{className:"flex flex-row items-center justify-end space-x-1",children:[(0,l.jsx)("span",{className:"cursor-text font-semibold",children:t}),(0,l.jsx)(d,{})]})};t.Z=e=>{var t;let{exchangeRate:n,price:s}=e,{data:d}=(0,i.o)(),c=(0,o.H)(),v=null==c?void 0:null===(t=c.exchange_modal)||void 0===t?void 0:t.footer,m=(0,r.useMemo)(()=>{var e;return null==d?void 0:null===(e=d.chargeable)||void 0===e?void 0:e.points},[d]);return(0,l.jsxs)("div",{className:"flex flex-wrap gap-1 rounded-lg  md:items-center md:justify-between",children:[(0,l.jsx)(a.ns,{label:null==v?void 0:v.my_wp,value:(0,l.jsx)(u,{text:"".concat(null!=m?m:"0")}),stylingOptions:{valueStyles:"text-icons-warning text-right",containerStyles:"!cursor-default hover:bg-surface-subdued"}}),(0,l.jsx)(a.ns,{label:null==v?void 0:v.price,value:(0,l.jsx)(u,{text:"".concat(null!=n?n:"0")}),stylingOptions:{valueStyles:"text-icons-warning text-right",containerStyles:"!cursor-default hover:bg-surface-subdued"}}),(0,l.jsx)(a.ns,{label:null==v?void 0:v.charge,value:(0,l.jsx)(u,{text:"".concat(null!=s?s:"0")}),stylingOptions:{valueStyles:"text-icons-warning text-right",containerStyles:"!cursor-default hover:bg-surface-subdued"}})]})}},24105:function(e,t,n){"use strict";n.d(t,{H:function(){return i}});var l=n(44683);let i=()=>{let{t:e}=(0,l.useTranslation)();return e("lottery")}},88942:function(e,t,n){"use strict";n.d(t,{o:function(){return o}});var l=n(73667),i=n(27504),r=n(6984);let o=()=>{let{user:{currentUser:e,isLoading:t,isFetching:n,isAuthenticated:o}}=(0,r.useAuth)();return(0,l.useQuery)({queryKey:["playerCompPoints",e],queryFn:()=>(0,i.ZP)("player/comp_points"),enabled:!t&&!n&&!!o})}}},function(e){e.O(0,[5736,5878,6484,6769,3285,465,703,8792,4657,3369,7306,6708,4573,168,377,5848,2337,4708,7191,5809,2971,6446,1744],function(){return e(e.s=65745)}),_N_E=e.O()}]);