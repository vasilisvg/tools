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
	console.log(e.keyCode);
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
				console.log(curLeft)
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
	//console.log('has changed');
});
