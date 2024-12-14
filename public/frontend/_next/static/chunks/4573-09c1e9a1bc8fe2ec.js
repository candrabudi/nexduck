"use strict";(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[4573],{15574:function(e,t,s){s.r(t),s.d(t,{HydrationBoundary:function(){return a}});var r=s(2265);function u(e){return e}function i(e,t,s){if("object"!=typeof t||null===t)return;let r=e.getMutationCache(),i=e.getQueryCache(),n=s?.defaultOptions?.deserializeData??e.getDefaultOptions().hydrate?.deserializeData??u,a=t.mutations||[],o=t.queries||[];a.forEach(({state:t,...u})=>{r.build(e,{...e.getDefaultOptions().hydrate?.mutations,...s?.defaultOptions?.mutations,...u},t)}),o.forEach(({queryKey:t,state:r,queryHash:u,meta:a,promise:o})=>{let l=i.get(u),h=void 0===r.data?r.data:n(r.data);if(l){if(l.state.dataUpdatedAt<r.dataUpdatedAt){let{fetchStatus:e,...t}=r;l.setState({...t,data:h})}}else l=i.build(e,{...e.getDefaultOptions().hydrate?.queries,...s?.defaultOptions?.queries,queryKey:t,queryHash:u,meta:a},{...r,data:h,fetchStatus:"idle"});if(o){let e=Promise.resolve(o).then(n);l.fetch(void 0,{initialPromise:e})}})}var n=s(47082),a=e=>{let{children:t,options:s={},state:u,queryClient:a}=e,o=(0,n.useQueryClient)(a),[l,h]=r.useState(),c=r.useRef(s);return c.current=s,r.useMemo(()=>{if(u){if("object"!=typeof u)return;let e=o.getQueryCache(),t=u.queries||[],s=[],r=[];for(let u of t){let t=e.get(u.queryHash);if(t){let e=u.state.dataUpdatedAt>t.state.dataUpdatedAt,s=null==l?void 0:l.find(e=>e.queryHash===u.queryHash);e&&(!s||u.state.dataUpdatedAt>s.state.dataUpdatedAt)&&r.push(u)}else s.push(u)}s.length>0&&i(o,{queries:s},c.current),r.length>0&&h(e=>e?[...e,...r]:r)}},[o,l,u]),r.useEffect(()=>{l&&(i(o,{queries:l},c.current),h(void 0))},[o,l]),t}},69939:function(e,t,s){s.r(t),s.d(t,{useIsFetching:function(){return n}});var r=s(2265),u=s(45139),i=s(47082);function n(e,t){let s=(0,i.useQueryClient)(t),n=s.getQueryCache();return r.useSyncExternalStore(r.useCallback(e=>n.subscribe(u.V.batchCalls(e)),[n]),()=>s.isFetching(e),()=>s.isFetching(e))}},53182:function(e,t,s){s.r(t),s.d(t,{useIsMutating:function(){return a},useMutationState:function(){return l}});var r=s(2265),u=s(46063),i=s(45139),n=s(47082);function a(e,t){let s=(0,n.useQueryClient)(t);return l({filters:{...e,status:"pending"}},s).length}function o(e,t){return e.findAll(t.filters).map(e=>t.select?t.select(e):e.state)}function l(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=arguments.length>1?arguments[1]:void 0,s=(0,n.useQueryClient)(t).getMutationCache(),a=r.useRef(e),l=r.useRef(null);return l.current||(l.current=o(s,e)),r.useEffect(()=>{a.current=e}),r.useSyncExternalStore(r.useCallback(e=>s.subscribe(()=>{let t=(0,u.Q$)(l.current,o(s,a.current));l.current!==t&&(l.current=t,i.V.schedule(e))}),[s]),()=>l.current,()=>l.current)}},66906:function(e,t,s){s.r(t),s.d(t,{useQueries:function(){return y}});var r=s(2265),u=s(45139),i=s(86968),n=s(44614),a=s(46063);function o(e,t){return e.filter(e=>!t.includes(e))}var l=class extends n.l{#e;#t;#s;#r;#u;#i;#n;#a;constructor(e,t,s){super(),this.#e=e,this.#r=s,this.#s=[],this.#u=[],this.#t=[],this.setQueries(t)}onSubscribe(){1===this.listeners.size&&this.#u.forEach(e=>{e.subscribe(t=>{this.#o(e,t)})})}onUnsubscribe(){this.listeners.size||this.destroy()}destroy(){this.listeners=new Set,this.#u.forEach(e=>{e.destroy()})}setQueries(e,t,s){this.#s=e,this.#r=t,u.V.batch(()=>{let e=this.#u,t=this.#l(this.#s);t.forEach(e=>e.observer.setOptions(e.defaultedQueryOptions,s));let r=t.map(e=>e.observer),u=r.map(e=>e.getCurrentResult()),i=r.some((t,s)=>t!==e[s]);(e.length!==r.length||i)&&(this.#u=r,this.#t=u,this.hasListeners()&&(o(e,r).forEach(e=>{e.destroy()}),o(r,e).forEach(e=>{e.subscribe(t=>{this.#o(e,t)})}),this.#h()))})}getCurrentResult(){return this.#t}getQueries(){return this.#u.map(e=>e.getCurrentQuery())}getObservers(){return this.#u}getOptimisticResult(e,t){let s=this.#l(e).map(e=>e.observer.getOptimisticResult(e.defaultedQueryOptions));return[s,e=>this.#c(e??s,t),()=>this.#f(s,e)]}#f(e,t){let s=this.#l(t);return s.map((t,r)=>{let u=e[r];return t.defaultedQueryOptions.notifyOnChangeProps?u:t.observer.trackResult(u,e=>{s.forEach(t=>{t.observer.trackProp(e)})})})}#c(e,t){return t?(this.#i&&this.#t===this.#a&&t===this.#n||(this.#n=t,this.#a=this.#t,this.#i=(0,a.Q$)(this.#i,t(e))),this.#i):e}#l(e){let t=new Map(this.#u.map(e=>[e.options.queryHash,e])),s=[];return e.forEach(e=>{let r=this.#e.defaultQueryOptions(e),u=t.get(r.queryHash);u?s.push({defaultedQueryOptions:r,observer:u}):s.push({defaultedQueryOptions:r,observer:new i.z(this.#e,r)})}),s}#o(e,t){let s=this.#u.indexOf(e);-1!==s&&(this.#t=function(e,t,s){let r=e.slice(0);return r[t]=s,r}(this.#t,s,t),this.#h())}#h(){this.hasListeners()&&this.#i!==this.#c(this.#f(this.#t,this.#s),this.#r?.combine)&&u.V.batch(()=>{this.listeners.forEach(e=>{e(this.#t)})})}},h=s(47082),c=s(22960),f=s(39098),d=s(14951),p=s(1244),b=s(20826);function y(e,t){let{queries:s,...n}=e,a=(0,h.useQueryClient)(t),o=(0,c.useIsRestoring)(),y=(0,f.useQueryErrorResetBoundary)(),g=r.useMemo(()=>s.map(e=>{let t=a.defaultQueryOptions(e);return t._optimisticResults=o?"isRestoring":"optimistic",t}),[s,a,o]);g.forEach(e=>{(0,p.A8)(e),(0,d.pf)(e,y)}),(0,d.JN)(y);let[v]=r.useState(()=>new l(a,g,n)),[m,C,Q]=v.getOptimisticResult(g,n.combine);r.useSyncExternalStore(r.useCallback(e=>o?b.Z:v.subscribe(u.V.batchCalls(e)),[v,o]),()=>v.getCurrentResult(),()=>v.getCurrentResult()),r.useEffect(()=>{v.setQueries(g,n,{listeners:!1})},[g,n,v]);let O=m.some((e,t)=>(0,p.SB)(g[t],e))?m.flatMap((e,t)=>{let s=g[t];if(s){let t=new i.z(a,s);if((0,p.SB)(s,e))return(0,p.j8)(s,t,y);(0,p.Z$)(e,o)&&(0,p.j8)(s,t,y)}return[]}):[];if(O.length>0)throw Promise.all(O);let R=m.find((e,t)=>{let s=g[t];return s&&(0,d.KJ)({result:e,errorResetBoundary:y,throwOnError:s.throwOnError,query:a.getQueryCache().get(s.queryHash)})});if(null==R?void 0:R.error)throw R.error;return C(Q())}},83158:function(e,t,s){s.r(t),s.d(t,{useSuspenseInfiniteQuery:function(){return n}});var r=s(48861),u=s(99473),i=s(1244);function n(e,t){return(0,u.r)({...e,enabled:!0,suspense:!0,throwOnError:i.Ct},r.c,t)}},34239:function(e,t,s){s.r(t),s.d(t,{useSuspenseQueries:function(){return i}});var r=s(66906),u=s(1244);function i(e,t){return(0,r.useQueries)({...e,queries:e.queries.map(e=>({...e,suspense:!0,throwOnError:u.Ct,enabled:!0,placeholderData:void 0}))},t)}},96902:function(e,t,s){s.r(t),s.d(t,{useSuspenseQuery:function(){return n}});var r=s(86968),u=s(99473),i=s(1244);function n(e,t){return(0,u.r)({...e,enabled:!0,suspense:!0,throwOnError:i.Ct,placeholderData:void 0},r.z,t)}}}]);