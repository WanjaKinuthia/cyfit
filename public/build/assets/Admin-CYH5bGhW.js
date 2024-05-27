import{o as A,r as u,a as p,b as l,c as B,w as D,d as e,e as n,F as x,f as _,g as M,h as y,v as k,i as N,t as m,p as V,j as T}from"./app-DTm-p0Mk.js";import{_ as q}from"./AuthenticatedLayout-B9mPJItC.js";import{_ as j}from"./_plugin-vue_export-helper-DlAUqK2U.js";import"./ApplicationLogo-M_mRncSF.js";const f=g=>(V("data-v-64a32e83"),g=g(),T(),g),L={class:"container mx-auto p-4"},R={key:0,class:"text-2xl font-bold text-red-600 mb-9 ml-40"},z={key:1,class:"text-2xl font-bold text-red-600 mb-9 ml-40"},G={class:"overflow-x-auto"},H={key:0},J={class:"min-w-full bg-white"},K=f(()=>e("thead",null,[e("tr",null,[e("th",{class:"py-2 px-4 bg-gray-200 text-left"},"ID"),e("th",{class:"py-2 px-4 bg-gray-200 text-left"},"Name"),e("th",{class:"py-2 px-4 bg-gray-200 text-left"},"Email"),e("th",{class:"py-2 px-4 bg-gray-200 text-left"},"Role"),e("th",{class:"py-2 px-4 bg-gray-200 text-left"},"Actions")])],-1)),O={class:"py-2 px-4 border-b"},P={class:"py-2 px-4 border-b"},Q={class:"py-2 px-4 border-b"},W={class:"py-2 px-4 border-b"},X={class:"py-2 px-4 border-b"},Y=["onClick"],Z=["onClick"],ee={key:1},te={class:"mb-5"},ae=f(()=>e("label",{for:"name",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"}," Name",-1)),se={class:"mb-5"},le=f(()=>e("label",{for:"Email",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},"Email",-1)),re={class:"mb-5"},oe=f(()=>e("label",{for:"role_id",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},"Select a role",-1)),de=["value"],ue=f(()=>e("button",{type:"submit",class:"text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-4"},"Submit",-1)),ne={__name:"Admin",setup(g){A(async()=>{await S(),await F()});const r=u([]),v=u([]),o=u(""),c=u(""),d=u(null),i=u(!1),h=u(!1),b=u(null),w=async()=>{try{const s=await p.post("http://cyfit.test:8000/api/users",{name:o.value,email:c.value,role_id:d.value}),a={id:r.value.length+1,name:o.value,role:v.value.find(t=>t.id==d.value).name};r.value.push(a),alert("user has been created successfully"),i.value=!1}catch{alert("could not add user")}},I=s=>{r.value.findIndex(t=>t.id===s.id)!==-1&&(o.value=s.name,c.value=s.email,d.value=s.role_id,h.value=!0,b.value=s.id,i.value=!0)},C=()=>{o.value=null,c.value=null,d.value=null,h.value=!1,i.value=!1,b.value=null},E=async s=>{try{const a=await p.delete("http://cyfit.test:8000/api/users/"+s);this.fetchusers(),alert("user has been deleted successfully")}catch{alert("user deleted successfully")}},S=async()=>{const s=await p.get("http://cyfit.test:8000/api/users");r.value=s.data},F=async()=>{const s=await p.get("http://cyfit.test:8000/api/roles");v.value=s.data},U=async()=>{try{const s=await p.put("http://cyfit.test:8000/api/users/"+b.value,{name:o.value,email:c.value,role_id:d.value}),a={id:b.value,name:o.value,role:v.value.find(t=>t.id==d.value).name};r.value=r.value.filter(t=>t.id!=b.value),r.value.push(a),alert("user has been updated successfully"),i.value=!1}catch{alert("could not update user")}};return(s,a)=>(l(),B(q,null,{default:D(()=>[e("div",L,[h.value?(l(),n("h2",z,"Edit Users and Trainers")):(l(),n("h2",R,"Add Users and Trainers")),e("div",G,[i.value==!1?(l(),n("div",H,[e("button",{onClick:a[0]||(a[0]=t=>i.value=!0),class:"bg-green-500 text-white px-4 py-2 mt-4 rounded"},"Create New Entry"),e("table",J,[K,e("tbody",null,[(l(!0),n(x,null,_(r.value,t=>(l(),n("tr",{key:t.id},[e("td",O,m(t.id),1),e("td",P,m(t.name),1),e("td",Q,m(t.email),1),e("td",W,m(t.role?t.role.name:""),1),e("td",X,[e("button",{onClick:$=>I(t),class:"bg-blue-500 text-white px-2 py-1 rounded mr-4"},"Edit",8,Y),e("button",{onClick:$=>E(t.id),class:"bg-red-500 text-white px-2 py-1 rounded"},"Delete",8,Z)])]))),128))])])])):(l(),n("div",ee,[e("form",{onSubmit:a[4]||(a[4]=M(t=>h.value?U():w(),["prevent"])),class:"max-w-sm mx-auto"},[e("div",te,[ae,y(e("input",{"onUpdate:modelValue":a[1]||(a[1]=t=>o.value=t),id:"name",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"name@flowbite.com",required:""},null,512),[[k,o.value]])]),e("div",se,[le,y(e("input",{"onUpdate:modelValue":a[2]||(a[2]=t=>c.value=t),type:"Email",id:"Email",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",required:""},null,512),[[k,c.value]])]),e("div",re,[oe,y(e("select",{"onUpdate:modelValue":a[3]||(a[3]=t=>d.value=t),id:"role_id",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"},[(l(!0),n(x,null,_(v.value,t=>(l(),n("option",{key:t.id,value:t.id},m(t.name),9,de))),128))],512),[[N,d.value]])]),ue,e("button",{onClick:C,type:"button",class:"text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-red-800"},"Cancel")],32)]))])])]),_:1}))}},me=j(ne,[["__scopeId","data-v-64a32e83"]]);export{me as default};
