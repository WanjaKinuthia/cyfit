import{h as u,B as i,b as t,e as s,d as c,t as l,y as m,H as p,r as _,o as f,v}from"./app-DTm-p0Mk.js";const g={class:"text-sm text-red-600"},S={__name:"InputError",props:{message:{type:String}},setup(e){return(a,o)=>u((t(),s("div",null,[c("p",g,l(e.message),1)],512)),[[i,e.message]])}},h={class:"block font-medium text-sm text-gray-700"},x={key:0},y={key:1},V={__name:"InputLabel",props:{value:{type:String}},setup(e){return(a,o)=>(t(),s("label",h,[e.value?(t(),s("span",x,l(e.value),1)):(t(),s("span",y,[m(a.$slots,"default")]))]))}},B={__name:"TextInput",props:{modelValue:{type:String,required:!0},modelModifiers:{}},emits:["update:modelValue"],setup(e,{expose:a}){const o=p(e,"modelValue"),n=_(null);return f(()=>{n.value.hasAttribute("autofocus")&&n.value.focus()}),a({focus:()=>n.value.focus()}),(b,r)=>u((t(),s("input",{class:"border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm","onUpdate:modelValue":r[0]||(r[0]=d=>o.value=d),ref_key:"input",ref:n},null,512)),[[v,o.value]])}};export{V as _,B as a,S as b};
