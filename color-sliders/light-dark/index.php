<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quantity contrast</title>
	<link rel="stylesheet" href="//fonts.typotheque.com/WF-023273-007830.css">
<style>
html {
	font: 111%/1.5  "Fedra Sans Screen 2", helvetica, arial, sans-serif;
	text-rendering: optimizeLegibility;
	-webkit-font-feature-settings: "kern" 1, "liga" on, "dlig" on;
	   -moz-font-feature-settings: "kern" 1, "liga" on, "dlig" on;
	        font-feature-settings: "kern" 1, "liga" on, "dlig" on;
}
body {
	margin: 5vh 5vw 10vh;
	height: 85vh;
	transition: opacity .2s;
	display: flex;
	align-content: stretch;
}

div {
	width: 100%;
	height: 100%;
	background: silver;
	margin: 0;
	border: 0;
	text-align: center;
	font-size: 1em;
	padding: 0;

}
</style>
</head>
<body class="" id="items">

<?php 
$h = mt_rand(1,360);
$s = mt_rand(20,80);
$l = mt_rand(20,80);
?>
<div style="background:hsl(<?php echo $h.','.$s.'%,'.$l.'%'; ?>);"></div>


<?php 
$h = mt_rand(1,360);
//$s = mt_rand(20,80);
//$l = mt_rand(20,80);
?>
<div style="background:hsl(<?php echo $h.','.$s.'%,'.$l.'%'; ?>);"></div>


<?php 
$h = mt_rand(1,360);
//$s = mt_rand(20,80);
//$l = mt_rand(20,80);
?>
<div style="background:hsl(<?php echo $h.','.$s.'%,'.$l.'%'; ?>);"></div>


<?php 
$h = mt_rand(1,360);
//$s = mt_rand(20,80);
//$l = mt_rand(20,80);
?>
<div style="background:hsl(<?php echo $h.','.$s.'%,'.$l.'%'; ?>);"></div>

<?php 
$h = mt_rand(1,360);
//$s = mt_rand(20,80);
//$l = mt_rand(20,80);
?>
<div style="background:hsl(<?php echo $h.','.$s.'%,'.$l.'%'; ?>);"></div>



<script>
/*! Sortable 1.1.1 - MIT | git://github.com/rubaxa/Sortable.git */
!function(a){"use strict";"function"==typeof define&&define.amd?define(a):"undefined"!=typeof module&&"undefined"!=typeof module.exports?module.exports=a():"undefined"!=typeof Package?Sortable=a():window.Sortable=a()}(function(){"use strict";function a(a,b){this.el=a,this.options=b=b||{};var d={group:Math.random(),sort:!0,disabled:!1,store:null,handle:null,scroll:!0,scrollSensitivity:30,scrollSpeed:10,draggable:/[uo]l/i.test(a.nodeName)?"li":">*",ghostClass:"sortable-ghost",ignore:"a, img",filter:null,animation:0,setData:function(a,b){a.setData("Text",b.textContent)},dropBubble:!1,dragoverBubble:!1};for(var e in d)!(e in b)&&(b[e]=d[e]);var g=b.group;g&&"object"==typeof g||(g=b.group={name:g}),["pull","put"].forEach(function(a){a in g||(g[a]=!0)}),M.forEach(function(d){b[d]=c(this,b[d]||N),f(a,d.substr(2).toLowerCase(),b[d])},this),b.groups=" "+g.name+(g.put.join?" "+g.put.join(" "):"")+" ",a[F]=b;for(var h in this)"_"===h.charAt(0)&&(this[h]=c(this,this[h]));f(a,"mousedown",this._onTapStart),f(a,"touchstart",this._onTapStart),f(a,"dragover",this),f(a,"dragenter",this),Q.push(this._onDragOver),b.store&&this.sort(b.store.get(this))}function b(a){s&&s.state!==a&&(i(s,"display",a?"none":""),!a&&s.state&&t.insertBefore(s,q),s.state=a)}function c(a,b){var c=P.call(arguments,2);return b.bind?b.bind.apply(b,[a].concat(c)):function(){return b.apply(a,c.concat(P.call(arguments)))}}function d(a,b,c){if(a){c=c||H,b=b.split(".");var d=b.shift().toUpperCase(),e=new RegExp("\\s("+b.join("|")+")\\s","g");do if(">*"===d&&a.parentNode===c||(""===d||a.nodeName.toUpperCase()==d)&&(!b.length||((" "+a.className+" ").match(e)||[]).length==b.length))return a;while(a!==c&&(a=a.parentNode))}return null}function e(a){a.dataTransfer.dropEffect="move",a.preventDefault()}function f(a,b,c){a.addEventListener(b,c,!1)}function g(a,b,c){a.removeEventListener(b,c,!1)}function h(a,b,c){if(a)if(a.classList)a.classList[c?"add":"remove"](b);else{var d=(" "+a.className+" ").replace(/\s+/g," ").replace(" "+b+" ","");a.className=d+(c?" "+b:"")}}function i(a,b,c){var d=a&&a.style;if(d){if(void 0===c)return H.defaultView&&H.defaultView.getComputedStyle?c=H.defaultView.getComputedStyle(a,""):a.currentStyle&&(c=a.currentStyle),void 0===b?c:c[b];b in d||(b="-webkit-"+b),d[b]=c+("string"==typeof c?"":"px")}}function j(a,b,c){if(a){var d=a.getElementsByTagName(b),e=0,f=d.length;if(c)for(;f>e;e++)c(d[e],e);return d}return[]}function k(a){a.draggable=!1}function l(){K=!1}function m(a,b){var c=a.lastElementChild,d=c.getBoundingClientRect();return b.clientY-(d.top+d.height)>5&&c}function n(a){for(var b=a.tagName+a.className+a.src+a.href+a.textContent,c=b.length,d=0;c--;)d+=b.charCodeAt(c);return d.toString(36)}function o(a){for(var b=0;a&&(a=a.previousElementSibling);)"TEMPLATE"!==a.nodeName.toUpperCase()&&b++;return b}function p(a,b){var c,d;return function(){void 0===c&&(c=arguments,d=this,setTimeout(function(){1===c.length?a.call(d,c[0]):a.apply(d,c),c=void 0},b))}}var q,r,s,t,u,v,w,x,y,z,A,B,C,D,E={},F="Sortable"+(new Date).getTime(),G=window,H=G.document,I=G.parseInt,J=!!("draggable"in H.createElement("div")),K=!1,L=function(a,b,c,d,e,f){var g=H.createEvent("Event");g.initEvent(b,!0,!0),g.item=c||a,g.from=d||a,g.clone=s,g.oldIndex=e,g.newIndex=f,a.dispatchEvent(g)},M="onAdd onUpdate onRemove onStart onEnd onFilter onSort".split(" "),N=function(){},O=Math.abs,P=[].slice,Q=[],R=p(function(a,b,c){if(c&&b.scroll){var d,e,f,g,h=b.scrollSensitivity,i=b.scrollSpeed,j=a.clientX,k=a.clientY,l=window.innerWidth,m=window.innerHeight;if(w!==c&&(v=b.scroll,w=c,v===!0)){v=c;do if(v.offsetWidth<v.scrollWidth||v.offsetHeight<v.scrollHeight)break;while(v=v.parentNode)}v&&(d=v,e=v.getBoundingClientRect(),f=(O(e.right-j)<=h)-(O(e.left-j)<=h),g=(O(e.bottom-k)<=h)-(O(e.top-k)<=h)),f||g||(f=(h>=l-j)-(h>=j),g=(h>=m-k)-(h>=k),(f||g)&&(d=G)),(E.vx!==f||E.vy!==g||E.el!==d)&&(E.el=d,E.vx=f,E.vy=g,clearInterval(E.pid),d&&(E.pid=setInterval(function(){d===G?G.scrollTo(G.scrollX+f*i,G.scrollY+g*i):(g&&(d.scrollTop+=g*i),f&&(d.scrollLeft+=f*i))},24)))}},30);return a.prototype={constructor:a,_dragStarted:function(){t&&q&&(h(q,this.options.ghostClass,!0),a.active=this,L(t,"start",q,t,z))},_onTapStart:function(a){var b=a.type,c=a.touches&&a.touches[0],e=(c||a).target,g=e,h=this.options,i=this.el,l=h.filter;if(!("mousedown"===b&&0!==a.button||h.disabled)&&(e=d(e,h.draggable,i))){if(z=o(e),"function"==typeof l){if(l.call(this,a,e,this))return L(g,"filter",e,i,z),void a.preventDefault()}else if(l&&(l=l.split(",").some(function(a){return a=d(g,a.trim(),i),a?(L(a,"filter",e,i,z),!0):void 0})))return void a.preventDefault();if((!h.handle||d(g,h.handle,i))&&e&&!q&&e.parentNode===i){C=a,t=this.el,q=e,u=q.nextSibling,B=this.options.group,q.draggable=!0,h.ignore.split(",").forEach(function(a){j(e,a.trim(),k)}),c&&(C={target:e,clientX:c.clientX,clientY:c.clientY},this._onDragStart(C,"touch"),a.preventDefault()),f(H,"mouseup",this._onDrop),f(H,"touchend",this._onDrop),f(H,"touchcancel",this._onDrop),f(q,"dragend",this),f(t,"dragstart",this._onDragStart),J||this._onDragStart(C,!0);try{H.selection?H.selection.empty():window.getSelection().removeAllRanges()}catch(m){}}}},_emulateDragOver:function(){if(D){i(r,"display","none");var a=H.elementFromPoint(D.clientX,D.clientY),b=a,c=" "+this.options.group.name,d=Q.length;if(b)do{if(b[F]&&b[F].groups.indexOf(c)>-1){for(;d--;)Q[d]({clientX:D.clientX,clientY:D.clientY,target:a,rootEl:b});break}a=b}while(b=b.parentNode);i(r,"display","")}},_onTouchMove:function(a){if(C){var b=a.touches?a.touches[0]:a,c=b.clientX-C.clientX,d=b.clientY-C.clientY,e=a.touches?"translate3d("+c+"px,"+d+"px,0)":"translate("+c+"px,"+d+"px)";D=b,i(r,"webkitTransform",e),i(r,"mozTransform",e),i(r,"msTransform",e),i(r,"transform",e),a.preventDefault()}},_onDragStart:function(a,b){var c=a.dataTransfer,d=this.options;if(this._offUpEvents(),"clone"==B.pull&&(s=q.cloneNode(!0),i(s,"display","none"),t.insertBefore(s,q)),b){var e,g=q.getBoundingClientRect(),h=i(q);r=q.cloneNode(!0),i(r,"top",g.top-I(h.marginTop,10)),i(r,"left",g.left-I(h.marginLeft,10)),i(r,"width",g.width),i(r,"height",g.height),i(r,"opacity","0.8"),i(r,"position","fixed"),i(r,"zIndex","100000"),t.appendChild(r),e=r.getBoundingClientRect(),i(r,"width",2*g.width-e.width),i(r,"height",2*g.height-e.height),"touch"===b?(f(H,"touchmove",this._onTouchMove),f(H,"touchend",this._onDrop),f(H,"touchcancel",this._onDrop)):(f(H,"mousemove",this._onTouchMove),f(H,"mouseup",this._onDrop)),this._loopId=setInterval(this._emulateDragOver,150)}else c&&(c.effectAllowed="move",d.setData&&d.setData.call(this,c,q)),f(H,"drop",this);setTimeout(this._dragStarted,0)},_onDragOver:function(a){var c,e,f,g=this.el,h=this.options,j=h.group,k=j.put,n=B===j,o=h.sort;if(q&&(void 0!==a.preventDefault&&(a.preventDefault(),!h.dragoverBubble&&a.stopPropagation()),B&&!h.disabled&&(n?o||(f=!t.contains(q)):B.pull&&k&&(B.name===j.name||k.indexOf&&~k.indexOf(B.name)))&&(void 0===a.rootEl||a.rootEl===this.el))){if(R(a,h,this.el),K)return;if(c=d(a.target,h.draggable,g),e=q.getBoundingClientRect(),f)return b(!0),void(s||u?t.insertBefore(q,s||u):o||t.appendChild(q));if(0===g.children.length||g.children[0]===r||g===a.target&&(c=m(g,a))){if(c){if(c.animated)return;v=c.getBoundingClientRect()}b(n),g.appendChild(q),this._animate(e,q),c&&this._animate(v,c)}else if(c&&!c.animated&&c!==q&&void 0!==c.parentNode[F]){x!==c&&(x=c,y=i(c));var p,v=c.getBoundingClientRect(),w=v.right-v.left,z=v.bottom-v.top,A=/left|right|inline/.test(y.cssFloat+y.display),C=c.offsetWidth>q.offsetWidth,D=c.offsetHeight>q.offsetHeight,E=(A?(a.clientX-v.left)/w:(a.clientY-v.top)/z)>.5,G=c.nextElementSibling;K=!0,setTimeout(l,30),b(n),p=A?c.previousElementSibling===q&&!C||E&&C:G!==q&&!D||E&&D,p&&!G?g.appendChild(q):c.parentNode.insertBefore(q,p?G:c),this._animate(e,q),this._animate(v,c)}}},_animate:function(a,b){var c=this.options.animation;if(c){var d=b.getBoundingClientRect();i(b,"transition","none"),i(b,"transform","translate3d("+(a.left-d.left)+"px,"+(a.top-d.top)+"px,0)"),b.offsetWidth,i(b,"transition","all "+c+"ms"),i(b,"transform","translate3d(0,0,0)"),clearTimeout(b.animated),b.animated=setTimeout(function(){i(b,"transition",""),i(b,"transform",""),b.animated=!1},c)}},_offUpEvents:function(){g(H,"mouseup",this._onDrop),g(H,"touchmove",this._onTouchMove),g(H,"touchend",this._onDrop),g(H,"touchcancel",this._onDrop)},_onDrop:function(b){var c=this.el,d=this.options;clearInterval(this._loopId),clearInterval(E.pid),g(H,"drop",this),g(H,"mousemove",this._onTouchMove),g(c,"dragstart",this._onDragStart),this._offUpEvents(),b&&(b.preventDefault(),!d.dropBubble&&b.stopPropagation(),r&&r.parentNode.removeChild(r),q&&(g(q,"dragend",this),k(q),h(q,this.options.ghostClass,!1),t!==q.parentNode?(A=o(q),L(q.parentNode,"sort",q,t,z,A),L(t,"sort",q,t,z,A),L(q,"add",q,t,z,A),L(t,"remove",q,t,z,A)):(s&&s.parentNode.removeChild(s),q.nextSibling!==u&&(A=o(q),L(t,"update",q,t,z,A),L(t,"sort",q,t,z,A))),a.active&&L(t,"end",q,t,z,A)),t=q=r=u=s=v=w=C=D=x=y=B=a.active=null,this.save())},handleEvent:function(a){var b=a.type;"dragover"===b||"dragenter"===b?(this._onDragOver(a),e(a)):("drop"===b||"dragend"===b)&&this._onDrop(a)},toArray:function(){for(var a,b=[],c=this.el.children,e=0,f=c.length;f>e;e++)a=c[e],d(a,this.options.draggable,this.el)&&b.push(a.getAttribute("data-id")||n(a));return b},sort:function(a){var b={},c=this.el;this.toArray().forEach(function(a,e){var f=c.children[e];d(f,this.options.draggable,c)&&(b[a]=f)},this),a.forEach(function(a){b[a]&&(c.removeChild(b[a]),c.appendChild(b[a]))})},save:function(){var a=this.options.store;a&&a.set(this)},closest:function(a,b){return d(a,b||this.options.draggable,this.el)},option:function(a,b){var c=this.options;return void 0===b?c[a]:void(c[a]=b)},destroy:function(){var a=this.el,b=this.options;M.forEach(function(c){g(a,c.substr(2).toLowerCase(),b[c])}),g(a,"mousedown",this._onTapStart),g(a,"touchstart",this._onTapStart),g(a,"dragover",this),g(a,"dragenter",this),Array.prototype.forEach.call(a.querySelectorAll("[draggable]"),function(a){a.removeAttribute("draggable")}),Q.splice(Q.indexOf(this._onDragOver),1),this._onDrop(),this.el=null}},a.utils={on:f,off:g,css:i,find:j,bind:c,is:function(a,b){return!!d(a,b,a)},throttle:p,closest:d,toggleClass:h,dispatchEvent:L,index:o},a.version="1.1.1",a.create=function(b,c){return new a(b,c)},a});

var el = document.getElementById('items');
var sortable = Sortable.create(el);
</script>
</body>
</html>
