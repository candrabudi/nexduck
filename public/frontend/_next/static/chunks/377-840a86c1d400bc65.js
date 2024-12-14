"use strict";(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[377],{77164:function(e,t,n){function r(e){let{src:t,width:n,quality:r=75}=e;return"https://www.wild.io/cdn-cgi/image/width=".concat(n,",quality=").concat(r,",format=webp/").concat(t)}n.r(t),n.d(t,{default:function(){return r}})},44683:function(e,t,n){n.r(t),n.d(t,{useTranslation:function(){return a}});var r=n(43285);function a(e,t,n){return(0,r.$G)(e,n)}},81453:function(e,t,n){n.d(t,{V:function(){return l}});var r=n(57437),a=n(2265),i=n(73667),o=n(50622),u=n(74052),s=n(27504);let l=a.createContext({});l.displayName="AuthContext",t.Z=e=>{let{children:t,...n}=e,[c]=(0,u.Z)(["_casino_session"]),{boot:d}=a.useContext(o.H),{isLoading:p=!0,data:m,isFetching:h,refetch:v}=(0,i.useQuery)({queryKey:["currentUser"],queryFn:()=>(0,s.ZP)("player",{token:null==c?void 0:c._casino_session}).then(e=>(d(e),e))}),f=a.useMemo(()=>m,[m]),y=a.useMemo(()=>!p&&null!=m&&!!m.email,[p,m]),g=a.useMemo(()=>({user:{isAuthenticated:y,isLoading:p,isFetching:h,refetch:v,currentUser:f||m||{}}}),[f,y,v,m,p,h]);return(0,r.jsx)(l.Provider,{value:g,...n,children:t})}},61413:function(e,t){t.Z={API_URL_BASE:"https://www.wild.io",API:{HOST:"https://wild.io",URL:"https://www.wild.io/api"},SITE_URL:"https://wild.io",COINMARKETCAP_API:"3d820d79-42f1-43b7-8ba0-15e5ab4f5d1a",AVATAR_SECRET:"wildwild1",RECAPTCHA_KEY:"6LeDpf0kAAAAAEpZjspy1lIZQtVJyq03JmdOtjp2",CHAT_API_KEY:"imNP8XkW",DEFAULT_CURRENCY:"BTC",DEFAULT_LANG:"en",ALL_AVAILABLE_COLLECTIONS:["all","slots","fresh-releases","jackpot","card","top-games","accumulating","live-casino","roulette","casual","fishing","lottery","craps","poker","video-poker","table-games","bonus-buy","christmas","skill-games","blackjack","crash-games","game-shows","megaways","baccarat","vip-games","halloween-games","booming-tournament","table-live-games","provably-fair","egyptian","fruit-games","easter-games","st-patrick-games","sport-games","valentine-games","hold-and-win","asian-games","low-volatility","music","high-volatility","bgaming-slotmania","booming-bonanza","game-week","endorphina-tournament","gamebeat-blitz","wazdan-tournament","oktoberfest-promo","pragmatic-play-tournament","mascot-tournament"],SHOWN_WILD_COLLECTIONS:["fruit-games","crash-games","megaways","low-volatility","high-volatility","hold-and-win","egyptian","game-shows","asian-games","provably-fair","easter-games","st-patrick-games","valentine-games","halloween","fishing","sport-games","music","video-poker","christmas"],SHOWN_WILD_CATEGORIES:["all","blackjack","bonus-buy","game-shows","jackpot","megaways","live-casino","roulette","slots","table-games","crash-games","skill-games","new","popular","bgaming-slotmania"],PAYMENT_PROVIDERS:["devcode","accentpay","payment_center","coinspaid","apco","skrill"],CRYPTO_CURRENCIES:["BTC","ETH","BCH","LTC","DOGE","USDT"],baseUrl:"https://www.wild.io",CURACAO_TOKEN:"ZXlKcGRpSTZJalkwUkdSWlMwTkNaR05FYUdsSldHSjFlbWxxYzJjOVBTSXNJblpoYkhWbElqb2laRnBQTWxSWU9XUmxPR1pOTVU5U1pVbHJhamhaUVQwOUlpd2liV0ZqSWpvaVl6RXhaamM1TmpjeVlqWTNNREZsTVdabVpHVmtZV0l3T0dWaFlXSmtaRFExTmpsbVlUQTFPR1JtWTJVeE5Ua3hZakExWldaak5tVTBPVE5tTlRoaE9DSXNJblJoWnlJNklpSjk"}},6984:function(e,t,n){n.r(t),n.d(t,{useAuth:function(){return q},useChangePassword:function(){return C},useConfirmAuthProvider:function(){return k},useConfirmation:function(){return A},useLogin:function(){return _},useLogout:function(){return S},useOAuthProvider:function(){return O},useOAuthProviderRoutes:function(){return x},useOAuthProvidersDetails:function(){return L},useRegister:function(){return T},useRemoveOauth:function(){return U},useResetInstructions:function(){return P},useUnlockAccount:function(){return b},useUpdateDetails:function(){return R},useUpdatePassword:function(){return E}});var r=n(2265),a=n(47082),i=n(20568),o=n(73667),u=n(90414),s=n.n(u),l=n(27504),c=n(83406),d=n(50622),p=n(18617),m=()=>{let{executeRecaptcha:e}=(0,p.xX)();return{handleReCaptchaVerify:(0,r.useCallback)(async t=>{if(e)return await e(t)},[e])}},h=n(81453),v=n(47907),f=n(16484),y=n(44683),g=n(95285),w=n(4249);let _=()=>{let e=(0,a.useQueryClient)(),{boot:t,shutdown:n}=(0,r.useContext)(d.H),{handleReCaptchaVerify:o}=m(),{track:u,identify:p,reset:h}=(0,w.z)();return(0,i.useMutation)({mutationFn:async e=>{let{user:t}=e,n=t.password&&t.password.length>0&&s()("sha256").update(t.password,"utf8").digest("hex"),r=await o("signin"),a={user:{email:t.email,password:n,otp_attempt:t.otp_attempt,captcha:r}};return(0,l.ZP)("users/sign_in",a,"POST")},onSuccess:r=>{h(),p(null==r?void 0:r.id,{email:r.email}),n(),t(r),u("signin_form_succeeded",{category:"auth",user_id:null==r?void 0:r.id}),c.a2.forEach(t=>{e.invalidateQueries({queryKey:[t]})})},onError:e=>{var t;(null==e?void 0:null===(t=e.required)||void 0===t?void 0:t.includes("captcha"))&&(o("signin"),u("signin_form_captcha_failed",{category:"auth"})),u("signin_form_failed",{category:"auth",label:JSON.stringify(null==e?void 0:e.errors)})}})},T=()=>{let e=(0,g.J)(),{toast:t}=(0,f.useToast)(),n=(0,a.useQueryClient)(),{identify:o}=(0,r.useContext)(d.H),{handleReCaptchaVerify:u}=m(),{track:p,identify:h}=(0,w.z)();return(0,i.useMutation)({mutationFn:async e=>{let{user:t,currency:n}=e,r=null==e?void 0:e.isStandalone,a=t.password&&t.password.length>0&&s()("sha256").update(t.password,"utf8").digest("hex"),i=await u("signup"),o={user:{email:t.email,password:a,terms_acceptance:t.terms_acceptance,profile_attributes:{currency:n},receive_promos:!0,captcha:i}};return(0,l.ZP)("users",o,"POST",r?{"X-Platform-App":"sportsbook"}:{})},onSuccess:r=>{h(null==r?void 0:r.id,{email:r.email}),o(r),p("signup_form_succeeded",{category:"auth",user_id:null==r?void 0:r.id}),c.a2.forEach(e=>{n.invalidateQueries({queryKey:[e]})}),t({state:"success",title:null==e?void 0:e.register_success,autoClose:1500})},onError:e=>{var t,n;(null==e?void 0:null===(n=e.errors)||void 0===n?void 0:null===(t=n.captcha)||void 0===t?void 0:t.invalid)==="is invalid"&&(u("signup"),p("signup_form_captcha_failed",{category:"auth"})),p("signup_form_failed",{category:"auth",label:JSON.stringify(null==e?void 0:e.errors)})}})},P=()=>{let{handleReCaptchaVerify:e}=m();return(0,i.useMutation)({mutationFn:async t=>{let{user:n}=t,r=await e("forgotPassword");try{let e={user:{email:n.email,captcha:r}};return(0,l.ZP)("users/password",e,"POST")}catch(t){var a,i;throw(null==t?void 0:null===(a=t.errors)||void 0===a?void 0:a.required)&&(null==t?void 0:null===(i=t.errors)||void 0===i?void 0:i.required.includes("captcha"))&&e("forgotPassword"),t}}})},C=()=>{let{handleReCaptchaVerify:e}=m();return(0,i.useMutation)({mutationFn:async t=>{let{password:n,password_confirmation:r,reset_password_token:a}=t,i=n&&n.length>0&&s()("sha256").update(n,"utf8").digest("hex"),o=r&&r.length>0&&s()("sha256").update(r,"utf8").digest("hex"),u=await e("resetPassword");try{return(0,l.ZP)("users/password",{user:{reset_password_token:a,password:i,password_confirmation:o,captcha:u}},"PUT")}catch(t){var c,d;throw(null==t?void 0:null===(c=t.errors)||void 0===c?void 0:c.required)&&(null==t?void 0:null===(d=t.errors)||void 0===d?void 0:d.required.includes("captcha"))&&e("resetPassword"),t}}})},E=()=>{let e=(0,a.useQueryClient)();return(0,i.useMutation)({mutationFn:e=>{let{email:t,password:n,current_password:r,password_confirmation:a}=e,i=r&&r.length>0&&s()("sha256").update(r,"utf8").digest("hex"),o=n&&n.length>0&&s()("sha256").update(n,"utf8").digest("hex"),u=a&&a.length>0&&s()("sha256").update(a,"utf8").digest("hex");try{return(0,l.ZP)("users",{user:{email:t,current_password:i,password:o,password_confirmation:u}},"PUT")}catch(e){throw e}},onSuccess:()=>e.invalidateQueries({queryKey:["currentUser"]})})},S=()=>{let e=(0,a.useQueryClient)(),{shutdown:t,boot:n}=(0,r.useContext)(d.H);(0,v.useRouter)(),(0,v.usePathname)();let{reset:o}=(0,w.z)();return(0,i.useMutation)({mutationKey:["logoutMutation"],mutationFn:()=>(0,l.ZP)("users/sign_out",{},"DELETE"),onSuccess:()=>{e.invalidateQueries({queryKey:["currentUser"]}),c.a2.map(t=>e.invalidateQueries({queryKey:[t]})),localStorage.removeItem("awaitingDeposit"),t(),n(),o()}})},b=()=>(0,i.useMutation)({mutationFn:async e=>await (0,l.ZP)("users/unlock?unlock_token=".concat(e),{},"GET"),retry:!1}),k=()=>{let{boot:e,shutdown:t}=(0,r.useContext)(d.H);(0,v.useRouter)();let n=(0,g.J)(),{toast:o}=(0,f.useToast)(),{track:u,reset:s,identify:p}=(0,w.z)(),m=(0,a.useQueryClient)();return(0,i.useMutation)({mutationFn:async e=>await (0,l.ZP)("auth_providers/confirm",{confirmation_token:e},"POST"),onSuccess:n=>{s(),p(null==n?void 0:n.id,{email:n.email}),t(),e(n),u("auth_provider_confirmation_succeeded",{category:"auth",user_id:null==n?void 0:n.id}),c.a2.map(e=>m.invalidateQueries({queryKey:[e]}))},onError:e=>{o({state:"error",title:null==n?void 0:n.general_error});let t=new URL(window.location.href);t.searchParams.delete("confirmation_token"),t.searchParams.delete("isRedirected"),window.history.replaceState({},"",t.toString())},retry:!1})},A=e=>(0,o.useQuery)({queryKey:["confirmationToken"],queryFn:async()=>await (0,l.ZP)("users/confirmation?confirmation_token=".concat(e),{},"GET"),retry:!1,enabled:void 0!==e}),R=()=>{let{track:e}=(0,w.z)(),{t}=(0,y.useTranslation)(),n=(0,g.J)(),{toast:r}=(0,f.useToast)(),o=(0,a.useQueryClient)();return(0,i.useMutation)({mutationFn:e=>{let t={user:{email:e.email,terms_acceptance:e.terms_acceptance,currency:e.currency}};return(0,l.ZP)("auth_providers/update_details",t,"POST")},onSuccess:()=>{o.invalidateQueries({queryKey:["currentUser"]}),e("new_terms_accepted",{category:"auth"})},onError:t=>{r({state:"error",title:null==n?void 0:n.general_error}),e("terms_update_failed",{category:"auth",label:null==t?void 0:t.errors})}})},O=()=>(0,o.useQuery)({queryKey:["authProviders"],queryFn:()=>(0,l.ZP)("info/auth_providers",{},"GET")}),L=()=>(0,o.useQuery)({queryKey:["authProviderDetails"],queryFn:()=>(0,l.ZP)("auth_providers",{},"GET")}),U=()=>{let{toast:e}=(0,f.useToast)(),t=(0,a.useQueryClient)();return(0,i.useMutation)({mutationFn:async e=>await (0,l.ZP)("auth_providers/".concat(e),{},"DELETE"),onSuccess:()=>{e({state:"success",title:"OAuth provider removed"}),t.invalidateQueries({queryKey:["authProviderDetails"]})},onError:()=>{e({state:"error",title:c.PC})},retry:!1})},x=()=>(0,o.useQuery)({queryKey:["authProvidersRoutes"],queryFn:()=>(0,l.ZP)("info/auth_providers_routes",{},"GET")}),q=()=>{let e=r.useContext(h.V);if(void 0===e)throw Error("useAuth must be used within a AuthProvider");return e}},4249:function(e,t,n){n.d(t,{z:function(){return i}});var r=n(13994),a=n(6984);let i=()=>{let e=(0,r.U0)(),{user:t}=(0,a.useAuth)();return{track:function(n){var r,a;let i=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},o={event:"gaTrack",event_action:n,event_category:(null==i?void 0:i.category)||"",event_label:(null==i?void 0:i.label)||""},u=null!==(a=null==i?void 0:i.user_id)&&void 0!==a?a:null==t?void 0:null===(r=t.currentUser)||void 0===r?void 0:r.id;null!=u&&(o.user_id="wildcasino:".concat(u)),(null==window?void 0:window.dataLayer)&&(null==window||window.dataLayer.push(o));let s={category:(null==i?void 0:i.category)||"",label:(null==i?void 0:i.label)||""};e&&e.capture(n,s)},identify:function(t){let n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};e&&e.identify(t,n)},page:(e,t)=>{(null==window?void 0:window.dataLayer)&&(null==window||window.dataLayer.push({event:"pageview",user_id:"wildcasino:".concat(t),page_path:e}))},reset:()=>{e&&e.reset()}}}},64758:function(e,t,n){n.d(t,{Ge:function(){return s},Gh:function(){return l},Gv:function(){return p},Pt:function(){return a},Ux:function(){return c},Xw:function(){return u},bK:function(){return o},oh:function(){return m},qY:function(){return i},rN:function(){return d}});var r=n(2265);let a="(max-width: 380px)",i="(min-width: 768px)",o="(min-width: 1024px)",u="(min-width: 1280px)",s="(min-width: 1536px)",l="(max-width: 640px)",c="(max-width: 768px)",d="(max-width: 1024px)",p="(max-width: 1280px)",m="(min-width: 1024px)";t.ZP=e=>{let[t,n]=(0,r.useState)(!0),[a,i]=r.useState(null);return r.useEffect(()=>{n(!1)},[]),r.useEffect(()=>{let t=window.matchMedia(e),n=()=>i(!!t.matches);return n(),t.addEventListener("change",n),()=>t.removeEventListener("change",n)},[e]),{matchesQuery:a,isLoading:t}}},95285:function(e,t,n){n.d(t,{J:function(){return a}});var r=n(44683);let a=()=>{var e;let{t}=(0,r.useTranslation)();return null===(e=t("notifications"))||void 0===e?void 0:e.other_toast_messages}},50622:function(e,t,n){n.d(t,{H:function(){return r}});let r=(0,n(2265).createContext)({})},27504:function(e,t,n){var r=n(61413),a=n(83406);let i=e=>0===Object.keys(e).length&&e.constructor===Object,o=async function(e){let{token:t,formData:n,isV2:a=!1,...o}=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},u=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"GET",s=arguments.length>3&&void 0!==arguments[3]?arguments[3]:{},l=arguments.length>4?arguments[4]:void 0,c={...o},d=null==o?void 0:o.limit_token,p=null==o?void 0:o.cashout_token;d&&(c.token=d,delete c.limit_token),p&&(c.token=p,delete c.cashout_token);let m={method:i(c)||"GET"!==u?u:"POST",body:i(c)||n?n||void 0:JSON.stringify(c),headers:{"Content-Type":"application/json",Accept:n?"multipart/form-data":a?"application/vnd.s.v2+json":"application/vnd.s.v1+json",Cookie:t&&"_casino_session=".concat(t),...s}};n&&delete m.headers["Content-Type"];let h="".concat(r.Z.API_URL_BASE,"/api"),v=l?"".concat(l,"/").concat(e):"".concat(h,"/").concat(e),f=await fetch(v,{credentials:"include",...m});if(401===f.status||403===f.status){let e;let t=await f.text();try{e=JSON.parse(t).reason}catch(e){console.log("Error parsing response:",e)}let n={message:401===f.status?"Unauthorized action. Please contact Customer Support.":"Access denied. Please contact Customer Support.",code:401};return void 0!==e&&(n.reason=e),Promise.reject(n)}try{let e=await f.text();if(f.ok)return e&&JSON.parse(e)||{};return Promise.reject(JSON.parse(e))}catch(e){return Promise.reject({message:"Internal system error",code:500})}};a.Qc,t.ZP=o},83406:function(e,t,n){n.d(t,{Dk:function(){return y},K:function(){return o},K2:function(){return l},M8:function(){return c},Mw:function(){return i},PC:function(){return u},Qc:function(){return r},TQ:function(){return a},a2:function(){return m},dQ:function(){return p},fG:function(){return h},lT:function(){return d},m8:function(){return v},od:function(){return s},z0:function(){return f}});let r="https://cms.wild.io",a=!1,i=!0,o=e=>{let{src:t,width:n,quality:r}=e;return"".concat(t,"?w=").concat(n,"&q=").concat(r||75)},u="There was an error while processing your request. Please contact Customer Support.",s=[{id:"general",label:"General",active:!0},{id:"security",label:"Security",active:!1},{id:"sessions",label:"Active Sessions",active:!1},{id:"kyc",label:"Verification",active:!1},{id:"limits",label:"Responsible Gambling",active:!1}],l=1/0,c={BTC:"Bitcoin",BCH:"Bitcoin Cash",ETH:"Ethereum",LTC:"Litecoin",DOG:"Dogecoin",USDT:"Tether",XRP:"Ripple",ADA:"Cardano",TRX:"TRON",BNB:"Binance Coin",SOL:"Solana"},d=["BTC","USDT","LTC","TRX","ETH","DOG"],p={ADA:15,BTC:1,BCH:6,LTC:6,DOG:6,ETH:10,XRP:3,USDT:10,BNB:1,TRX:19,SOL:1},m=["favoriteGames","currentUser","accounts","heroCarousels","promotions","playerCompPoints","playerSettings","userAvatar","playerLotteriesStatuses","playerStats","bonusesHistory","playerBonuses","playerFreeSpins"],h=[{id:1,title:"bronze"},{id:2,title:"silver"},{id:3,title:"gold"},{id:4,title:"platinum"},{id:5,title:"diamond"},{id:6,title:"ruby"},{id:7,title:"sapphire"}],v=["USD","EUR"],f=["WILD","LIVE","SPORTS","VIP","EXCLUSIVE"],y=["BTC","ETH","XRP","SOL","USDT","DOG","BNB","ADA","TRX","LTC","BCH"]},20208:function(e,t,n){n.d(t,{cn:function(){return i}});var r=n(75504),a=n(24210);function i(e){return(0,a.m)((0,r.W)(e))}}}]);