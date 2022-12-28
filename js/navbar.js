import Mustache from '../modules/mustache.js';

const cssHref = '/css/navbar.css';
const dataSrc = '/_data/navbar.json';
const templateSrc = '/views/navbar.html';
const elementId = 'navbar';
const clickHref = '/index.html';

async function main() {
	await renderView();
	document.getElementById(elementId).onclick = clickFunction;
	window.onscroll = scrollFunction;
	scrollFunction();
	if (cssHref != '') {
		appendCSS();
	}
}

function appendCSS () {
	let cssLink = document.createElement('link');
	cssLink.href = cssHref;
	cssLink.type = 'text/css';
	cssLink.rel = 'stylesheet';
	document.head.appendChild(cssLink);
}

async function renderView() {
	let dataReq = await fetch(dataSrc);
    let templateReq = await fetch(templateSrc);

	let data = await dataReq.json();
	let template = await templateReq.text();

    var content = Mustache.render(template, data);
	document.getElementById(elementId).innerHTML = content;
}

function scrollFunction() {
	document.getElementById(elementId).style.fontSize = scrollScale(10, 40, 5, 3.3) + "vh";
	document.getElementById(elementId).style.height = scrollScale(10, 40, 15, 10) + "vh";
}

function clickFunction() {
	window.location.assign(clickHref);
}

function scrollScale (scrollMin, scrollMax, valMin, valMax) {
	let scroll = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
	let ratio = (scroll - scrollMin) / (scrollMax - scrollMin);
	let val = valMin + ratio * (valMax - valMin);
	// console.log(val, valMax, valMin);
	return Math.min(Math.max(val, valMax), valMin);
}


// START MAIN
main();