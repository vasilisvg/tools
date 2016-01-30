var els = document.querySelectorAll('article > *');
var i = 0;
while (i < els.length) {
	els[i].onfocus = function() {
		if (document.querySelector('.hasFocus')) {
			document.querySelector('.hasFocus').classList.remove('hasFocus');
		}
		this.classList.add('hasFocus');
	}
	i++;
}

window.addEventListener('keydown', function(e) {
	//console.log(e.keyCode);
	var oneHundred = document.querySelector('article').offsetHeight;
	//console.log(oneHundred)
	var oneUnit = 1;
	if (e.altKey) {
		oneUnit = oneUnit/3;
	}
	var hasFocus = document.querySelector('.hasFocus');
	//Ignore everything when cmd is pressed
	if (e.metaKey || e.ctrlKey) { return; }
	if (e.keyCode == 40) { // naar beneden
		if (hasFocus) {
			curTop = hasFocus.offsetTop;
			curTop = Math.round((curTop/oneHundred)*100);
			hasFocus.style.top = curTop + oneUnit + '%';
		}
	}
	if (e.keyCode == 38) { // naar boven
		if (hasFocus) {
			curTop = hasFocus.offsetTop;
			curTop = Math.round((curTop/oneHundred)*100);
			hasFocus.style.top = curTop - oneUnit + '%';
		}
	}
	if (e.keyCode == 39) { // naar rechts
		if (hasFocus) {
			curLeft = hasFocus.offsetLeft;
			//console.log(curLeft)
			if (hasFocus.tagName === 'H1') {
				return;
			}
			if (hasFocus.tagName === 'H2' || hasFocus.tagName === 'FOOTER') {
				if (curLeft < 2) {
					oneUnit = 33.33333;
				}
				else {
					return;
				}
			}
			if (hasFocus.tagName === 'P' || hasFocus.tagName === 'UL') {
				//console.log(curLeft)
				if (curLeft < 2) {
					oneUnit = 33.33333;
				}
				else if (curLeft > 1) {
					oneUnit = 66.66666;
				}
				else {
					return;
				}
			}
			if (hasFocus.tagName === 'DIV'){
				curLeft = hasFocus.offsetLeft;
				curLeft = Math.round((curLeft/oneHundred)*100);
				oneUnit = curLeft + oneUnit;
			}
			hasFocus.style.left = oneUnit + '%';
		}
	}
	if (e.keyCode == 37) { // naar links
		if (hasFocus) {
			curLeft = hasFocus.offsetLeft;
			if (hasFocus.tagName === 'H1') {
				return;
			}
			if (hasFocus.tagName === 'H2' || hasFocus.tagName === 'FOOTER') {
				if (curLeft != 0) {
					oneUnit = 0;
				}
				else {
					return;
				}
			}
			if (hasFocus.tagName === 'P' || hasFocus.tagName === 'UL') {
				if (curLeft > (oneHundred/3)+20) {
					oneUnit = 33.33333;
				}
				else {
					oneUnit = 0;
				}
			}
			if (hasFocus.tagName === 'DIV'){
				curLeft = hasFocus.offsetLeft;
				curLeft = Math.round((curLeft/oneHundred)*100);
				oneUnit = curLeft - oneUnit;
				if(oneUnit < 1) oneUnit = 0;
			}
			hasFocus.style.left =  oneUnit + '%';
		}
	}
	//console.log(e.keyCode);
	if (e.keyCode == 84) { // t = toggle grids
		document.querySelector('article').classList.toggle('no-grid');
	}
	if (e.keyCode == 71) { // g = toggle grey
		document.querySelector('article').classList.toggle('grey');
	}
	if (e.keyCode == 87) { // w = toggle help/wat?
		document.querySelector('aside').classList.toggle('show');
	}
	hasChanged();
});
document.querySelector('body > a ').onclick = function(){
	document.querySelector('aside').classList.toggle('show');
	return false;
}
document.querySelector('aside > a ').onclick = function(){
	document.querySelector('aside').classList.toggle('show');
	return false;
}
function hasChanged(){
	var h1 = document.querySelector('article > h1');
	var h2 = document.querySelector('article > h2');
	var ul = document.querySelector('article > ul');
	var p1 = document.querySelector('article > p:first-of-type');
	var p2 = document.querySelector('article > p:last-of-type');
	var f = document.querySelector('article > footer');
	var d = document.querySelector('article > .dot');

	var h1t = r(h1.style.top);
	var h2t = r(h2.style.top);
	var ult = r(ul.style.top);
	var p1t = r(p1.style.top);
	var p2t = r(p2.style.top);
	var ft = r(f.style.top);
	var dt = r(d.style.top);
	var h1l = 0;
	var h2l = r(h2.style.left);
	var ull = r(ul.style.left);
	var p1l = r(p1.style.left);
	var p2l = r(p2.style.left);
	var fl = r(f.style.left);
	var dl = r(d.style.left);
	var stateObj = { foo: "bar" };
	var setting = "h1t="+h1t+"&h2t="+h2t+"&ult="+ult+"&p1t="+p1t+"&p2t="+p2t+"&ft="+ft+"&dt="+dt;
	setting += "&h2l="+h2l+"&ull="+ull+"&p1l="+p1l+"&p2l="+p2l+"&fl="+fl+"&dl="+dl
	history.replaceState(stateObj, "page 2", "?"+setting);
}
function r(v) {
	return v.replace('%','');
}
