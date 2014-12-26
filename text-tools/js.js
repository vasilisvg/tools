//console.log(localStorage['thecss']);

//document.getElementById('theStyle').innerHTML = localStorage['thecss'];
var triggers = document.querySelectorAll('input,select');
var j=0;
while(j<triggers.length) {
	if (triggers[j].id === 'headingratio') {
		setHeadingratio(triggers[j]);
		triggers[j].onchange = function(){
			setHeadingratio(this);
		}
		triggers[j].onload = function(){
			setHeadingratio(this);
		}
		triggers[j].onkeyup = function(){
			setHeadingratio(this);
		}
	}
	else if(triggers[j].id === 'longHeadings') {
		setLongheadings();
		triggers[j].onchange = function(){
			setLongheadings();
		}
	}
	else if(triggers[j].id === 'indiMeasure') {
		var el = document.querySelector('[data-property="max-width"]');
		showStyle(el);
		triggers[j].onchange = function(){
			showStyle(el);
		}
	}
	else {
		triggers[j].onchange = function(){
			showStyle(this);
		}
		triggers[j].onload = function(){
			showStyle(this);
		}
		triggers[j].oninput = function(){
			showStyle(this);
		}
		triggers[j].onkeyup = function(){
			showStyle(this);
		}
	}

	j++;
}




// Set the ratio for the headings
function setHeadingratio(el) {
	var ratio = el.value;
	setHeadingSize(ratio);
}

// Set the ratio for the different headings
function setHeadingSize(ratio) {
	setTheRules('h1','font-size',(ratio*ratio*ratio*ratio).toFixed(4),'em');
	setTheRules('h2','font-size',(ratio*ratio*ratio).toFixed(4),'em');
	setTheRules('h3','font-size',(ratio*ratio).toFixed(4),'em');
	setTheRules('h4','font-size',(ratio*1).toFixed(4),'em');
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

function showStyle(el) {
	var sheet = document.styleSheets[2];
	var tag = el.getAttribute('data-tag');
	//var index = el.parentNode.parentNode.getAttribute('data-index');
	var property = el.getAttribute('data-property');
	var pvalue = el.value;
	var unit = el.getAttribute('data-unit');
	if (property === 'max-width') {
		if (document.getElementById('indiMeasure').checked !== true) {
			unit = 'rem';
		}
	}
	if (el.type == 'range') {
		showOutput(el);
	}
	if (el.type == 'checkbox') {
		pvalue = isChecked(el);
	}
	if (unit == null) {
		unit = '';
	}
	setTheRules(tag,property,pvalue,unit);
}
function setTheRules(tag,property,pvalue,unit) {
	var sheet = document.styleSheets[2];
	var i = 0;
	var foundit = 0;
	if (sheet.cssRules.length > 0) {
		while (i < sheet.cssRules.length) {
			if ( tag === sheet.cssRules[i].selectorText ) { // deze tag zoeken we
				sheet.cssRules[i].style.setProperty(property,pvalue + unit);
				foundit = 1;
			}
			i++;
		}
	}
	if(foundit == 0) {
		var rule = tag + '{';
		rule += property + ': ' + pvalue + unit +';}';
		sheet.insertRule(rule, sheet.cssRules.length);
		//console.log(rule);
	}
	getStyleContents();
}
function getStyleContents() {
	var sheet = document.styleSheets[2];
	var i = 0;
	var styleContent = '';
	if (sheet.cssRules.length > 0) {
		while (i < sheet.cssRules.length) {
			styleContent += sheet.cssRules[i].cssText;
			i++;
		}
	}
	localStorage['thecss'] = styleContent;
	//console.log(styleContent);
}


// Set the measure
function showOutput(el) {
	var unit = el.getAttribute('data-unit');
	var mmin = el.getAttribute('data-min');
	var mmax = el.getAttribute('data-max');
	var mideal = el.getAttribute('data-ideal');

	if (unit == null) {
		unit = '';
	}
	if (mideal == null) {
		mideal = 1000000000000;
	}
	
	// Show the output in the gui
	el.parentNode.querySelector('output').value = el.value + unit;

	// if the measure is too small or wide, output is red
	if (el.value < mmin || el.value > mmax) {
		el.parentNode.classList.add('alert');
	}
	// if it's exactly 30em, the output is green
	else if (el.value == mideal) {
		el.parentNode.classList.add('pefect');
	}
	// else it's normal.
	else {
		el.parentNode.classList.remove('alert', 'pefect');
	}
}

function isChecked(el) {
	if (el.checked == true) {
		pvalue = el.value;
	}
	else {
		pvalue = 'normal';
	}
	return pvalue;
}



