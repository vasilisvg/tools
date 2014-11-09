window.onload = function() {
	var basefont = document.getElementById('pickafont');
	setBaseFontFamily(basefont);

	var measure = document.getElementById('measure');
	setMeasure(measure);

	var lineheight = document.getElementById('lineheight');
	setLineheight(lineheight);

	var fontsize = document.getElementById('fontsize');
	setFontsize(fontsize);

	var ratio = document.getElementById('headingratio');
	setHeadingratio(headingratio);

	setLongheadings();

}

var pickafont = document.querySelectorAll('.pickafont');
var j=0;
while(j<pickafont.length) {
	pickafont[j].onchange = function(){
		setBaseFontFamily(this, this.getAttribute('data-tag'));
	}
	pickafont[j].onkeyup = function(){
		setBaseFontFamily(this, this.getAttribute('data-tag'));
	}

	j++;
}

document.getElementById('measure').oninput = function(){
	setMeasure(this);
}

var lineheight = document.querySelectorAll('.setLineheight');
var l=0;
while(l<lineheight.length) {
	lineheight[l].oninput = function(){
		setLineheight(this, this.getAttribute('data-tag'));
	}

	l++;
}
document.getElementById('fontsize').oninput = function(){
	setFontsize(this);
}
document.getElementById('headingratio').onchange = function(){
	setHeadingratio(this);
}
document.getElementById('headingratio').onkeyup = function(){
	setHeadingratio(this);
}
document.getElementById('longHeadings').onchange = function(){
	setLongheadings(this);
}
document.getElementById('indiMeasure').onchange = function(){
	var measureEl = document.getElementById('measure');
	setMeasure(measureEl);
}

// Set the font-family of the base font
function setBaseFontFamily(el,tag) {
	var theTag = document.querySelectorAll(tag);
	var k = 0;
	while(k < theTag.length) {
		theTag[k].style.fontFamily = el.value;
		k++;
	}
}


// Set the measure
function setMeasure(el) {

	/* Check if the measure is set for the whole text column,
	or for each heading individually */
	if(document.getElementById('indiMeasure').checked == true) {
		document.querySelector('main').style.maxWidth = '100%';
		var headings = document.querySelectorAll('h1, h2, h3, h4, p');
		var i = 0;
		while(i < headings.length) {
			headings[i].style.maxWidth = el.value + 'em';
			i++;
		}
	}
	else {
		var headings = document.querySelectorAll('h1, h2, h3, h4, p');
		var i = 0;
		while(i < headings.length) {
			headings[i].style.maxWidth = '100%';
			i++;
		}
		document.querySelector('main').style.maxWidth = el.value + 'em';
	}

	// Show the output in the gui
	document.getElementById('measureSize').value = el.value + 'em';

	// if the measure is too small or wide, output is red
	if (el.value < 20 || el.value > 40) {
		document.getElementById('measureSize').parentElement.classList.add('alert');
	}
	// if it's exactly 30em, the output is green
	else if (el.value == 30) {
		document.getElementById('measureSize').parentElement.classList.add('pefect');
	}
	// else it's normal.
	else {
		document.getElementById('measureSize').parentElement.classList.remove('alert', 'pefect');
	}
}

// Set the line-height of the body copy
function setLineheight(el, tag) {
	var theTag = document.querySelectorAll(tag);
	var k = 0;
	while(k < theTag.length) {
		theTag[k].style.lineHeight = el.value;
		k++;
	}
	// Set the line-height
	//document.querySelector('html').style.lineHeight = el.value;
	// Show the line-height in the output
	document.getElementById('lineheightSize').value = el.value;

	// Make the output green if the value is somehow "perfect"
	if(el.value === 1.06 || el.value == 1.12 || el.value == 1.2 || el.value == 1.25 || el.value == 1.33 || el.value == 1.41 || el.value == 1.5 || el.value == 1.62 ) {
		document.getElementById('lineheightSize').parentElement.classList.add('pefect');
	}
	else {
		document.getElementById('lineheightSize').parentElement.classList.remove('pefect');
	}
}

// Set the font-size of the body copy
function setFontsize(el) {
	// Set the font-size
	document.querySelector('html').style.fontSize = el.value + 'em';
	// show the font-size in the output
	document.getElementById('fontsizeSize').value = el.value + 'em';
	// If the size is smaller than 1em, make it red
	if (el.value < 1) {
		document.getElementById('fontsizeSize').parentElement.classList.add('alert');
	}
	else {
		document.getElementById('fontsizeSize').parentElement.classList.remove('alert');
	}
}

// Set the ratio for the headings
function setHeadingratio(el) {
	var ratio = el.value;
	setHeadingSize(ratio);
}

// Set the ratio for the different headings
function setHeadingSize(ratio) {
	var headings = document.querySelectorAll('h1, h2, h3, h4');
	var i = 0;
	while(i < headings.length) {
		if(headings[i].tagName === 'H1') {
			headings[i].style.fontSize = ratio*ratio*ratio*ratio +'em';
		}
		if(headings[i].tagName === 'H2') {
			headings[i].style.fontSize = ratio*ratio*ratio +'em';
		}
		if(headings[i].tagName === 'H3') {
			headings[i].style.fontSize = ratio*ratio +'em';
		}
		if(headings[i].tagName === 'H4') {
			headings[i].style.fontSize = ratio +'em';
		}
		i++;
	}
}

// Toggle long or short headings
function setLongheadings() {
	// the checkbox
	var checkLongHeadings = document.getElementById('longHeadings');
	// The headings to fix
	var headings = document.querySelectorAll('h1, h2, h3, h4');
	var i = 0;
	while(i < headings.length) {
		if (checkLongHeadings.checked == true) {
			// show the content of the data-long attribute
			headings[i].innerHTML = headings[i].getAttribute('data-long');
		}
		else {
			// show the content of the data-short attribute
			headings[i].innerHTML = headings[i].getAttribute('data-short');
		}
		i++;
	}
}



