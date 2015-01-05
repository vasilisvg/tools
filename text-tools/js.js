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
	else if (triggers[j].id === 'canon-ratio' || triggers[j].id === 'margin-slider') {
		triggers[j].onchange = function(){
			setPageMargin(this);
		}
		triggers[j].oninput = function(){
			setPageMargin(this);
		}
		triggers[j].onkeyup = function(){
			setPageMargin(this);
		}
		triggers[j].onfocus = function() {
			document.querySelector('main').classList.add('active');
		}
		triggers[j].onblur = function() {
			document.querySelector('main').classList.remove('active');
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

document.getElementById("toolset").addEventListener("click", function(e) {
	// e.target is the clicked element!
	// If it was a list item
	if(e.target && e.target.nodeName == "LEGEND") {
		e.target.parentNode.classList.toggle('closed');
	}
});



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
	var hasColour = el.getAttribute('data-colour');
	if (property === 'max-width') {
		if (document.getElementById('indiMeasure').checked !== true) {
			unit = 'rem';
		}
	}
	if (el.type == 'range' && hasColour == null) {
		showOutput(el);
	}
	if (hasColour !== null) {
		pvalue = setColour(el);
	}
	if (el.type == 'checkbox') {
		pvalue = isChecked(el);
	}
	if (unit == null) {
		unit = '';
	}
	setTheRules(tag,property,pvalue,unit);
}
function setColour(el) {
	var cName = el.getAttribute('data-name');
	var cSeries = document.getElementsByTagName('input');
	var i = 0;
	while(i < cSeries.length) {
		if( cSeries[i].getAttribute('data-name') === cName ) {
			if (cSeries[i].getAttribute('data-colour') === 'hue') {
				var hue = cSeries[i].value;
			}
			if (cSeries[i].getAttribute('data-colour') === 'saturation') {
				var saturation = cSeries[i].value;
			}
			if (cSeries[i].getAttribute('data-colour') === 'lightness') {
				var lightness = cSeries[i].value;
			}
		}
		i++;
	}
	var theColour = 'hsl(' + hue + ', ' + saturation + '%, ' + lightness + '%)';
	el.parentNode.parentNode.getElementsByTagName('output')[0].value=theColour;
	return theColour;
}
function setTheRules(tag,property,pvalue,unit) {
	//console.log(tag);
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

function setPageMargin(el) {
	var main = document.querySelector('main');
	var mRatio = document.getElementById('canon-ratio').value;
	var mSize = document.getElementById('margin-slider').value;
	if (mRatio == 1) {
		mtop = 1;
		mright = 2;
		mbottom = 3;
	}
	else if (mRatio == 2) {
		mtop = 1.5;
		mright = 2;
		mbottom = 3;
	}
	else {
		mtop = 2;
		mright = 2;
		mbottom = 4;
	}
	margins = (mtop*mSize) + 'vh '+ (mright*mSize) + '% '+ (mbottom*mSize) + 'vh ';
	setTheRules('main','margin',margins,'');
	setTheRules('main:after','border-width', margins ,'');
}

// JSON
(function(){
	microAjax("settings.json", function (res) {
		var p = JSON.parse(res);
		console.log(p);
	});
})();


// help functions
(function(){
	var helpLink = document.querySelectorAll('label a');
	var i = 0;
	while (i < helpLink.length) {
		helpLink[i].onclick = function(){
			showHelp(this.href);
			return false;
		}
		i++;
	}
	function showHelp(href) {
		microAjax(href, function (res) {
		  var body = res.split('<body>');
		  var content = body[1].split('</body>');
		  document.getElementById('help-section').innerHTML = '<div>'+content[0]+'</div>';
		  document.getElementById('help-section').classList.add('is-open');
		});
	}
	document.getElementById('help-section').onclick = function(){
		document.getElementById('help-section').classList.remove('is-open');
	}
})();

function microAjax(B,A){this.bindFunction=function(E,D){return function(){return E.apply(D,[D])}};this.stateChange=function(D){if(this.request.readyState==4){this.callbackFunction(this.request.responseText)}};this.getRequest=function(){if(window.ActiveXObject){return new ActiveXObject("Microsoft.XMLHTTP")}else{if(window.XMLHttpRequest){return new XMLHttpRequest()}}return false};this.postBody=(arguments[2]||"");this.callbackFunction=A;this.url=B;this.request=this.getRequest();if(this.request){var C=this.request;C.onreadystatechange=this.bindFunction(this.stateChange,this);if(this.postBody!==""){C.open("POST",B,true);C.setRequestHeader("X-Requested-With","XMLHttpRequest");C.setRequestHeader("Content-type","application/x-www-form-urlencoded");C.setRequestHeader("Connection","close")}else{C.open("GET",B,true)}C.send(this.postBody)}};
