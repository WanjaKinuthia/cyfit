import{_ as u}from"./AuthenticatedLayout-B9mPJItC.js";import{r as a,o as f,b as v,c as b,w as y,a as n,d as o,t as l,p as w,j as x}from"./app-DTm-p0Mk.js";import{_ as I}from"./_plugin-vue_export-helper-DlAUqK2U.js";import"./ApplicationLogo-M_mRncSF.js";const i=e=>(w("data-v-c95d82dc"),e=e(),x(),e),A={class:"trainer-dashboard"},S={class:"bg-white shadow overflow-hidden sm:rounded-lg p-6"},T=i(()=>o("h3",{class:"text-lg font-medium text-gray-900 mb-4"},"Total Clients",-1)),k={class:"grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6"},C={class:"bg-orange-100 p-6 rounded-lg shadow text-center"},M=i(()=>o("div",{class:"text-gray-600"},"All Memberships ",-1)),B={class:"bg-orange-100 p-6 rounded-lg shadow text-center"},D={href:"/sessions"},N=i(()=>o("div",{class:"text-gray-600"},"All sessions ",-1)),j={__name:"TrainerDashboard",setup(e){const p=a(""),h=a([]),c=a(0),d=a(0),g=async()=>{try{const s=await n.get("/api/totalmembership");c.value=s.data}catch(s){console.error("error fetching total memberships",s)}},_=async()=>{try{const s=await n.get("/api/sessions/totalsessions");d.value=s.data}catch(s){console.error("error fetching total sessions",s)}},m=async()=>{try{const s=await n.get("/api/sessions");h.value=s.data}catch{console.log("Failed to fetch Session Types")}};return f(async()=>{await m(),g(),_()}),(s,t)=>(v(),b(u,null,{default:y(()=>[o("div",A,[o("h1",null,"Welcome "+l(p.value),1),o("div",S,[T,o("div",k,[o("div",C,[o("div",{class:"text-3xl font-bold",onClick:t[0]||(t[0]=(...r)=>s.toggleAllIssues&&s.toggleAllIssues(...r)),style:{cursor:"pointer"}},l(c.value),1),M]),o("div",B,[o("a",D,[o("div",{class:"text-3xl font-bold",onClick:t[1]||(t[1]=(...r)=>s.toggleAllIssues&&s.toggleAllIssues(...r)),style:{cursor:"pointer"}},l(d.value),1),N])])])])])]),_:1}))}},q=I(j,[["__scopeId","data-v-c95d82dc"]]);export{q as default};
