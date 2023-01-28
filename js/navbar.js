import Mustache from '../modules/mustache.js';

const cssHref = '/css/navbar.css';
const dataSrc = '/_data/navbar.json';
const templateSrc = '/views/navbar.html';

const navbarID = 'navbar'
const linksID = 'nav-links';
const buttonID = 'nav-button';

const scrollStart = 10;
const scrollEnd = 40;
const fontStart = 4;
const fontEnd = 2;
const heightStart = 10;
const heightEnd = 5;
const fontUnits = 'vw';
const heightUnits = 'vw';


async function main() {
	await renderView();
	// document.getElementById(buttonID).onclick = toggleLinks;
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
	document.getElementById(navbarID).innerHTML = content;
}

function scrollFunction() {
	document.getElementById(navbarID).style.fontSize = scrollScale(scrollStart, scrollEnd, fontStart, fontEnd) + fontUnits;
	document.getElementById(navbarID).style.height = scrollScale(scrollStart, scrollEnd, heightStart, heightEnd) + heightUnits;
}

// function clickFunction() {
// 	window.location.assign(clickHref);
// }

function scrollScale (scrollMin, scrollMax, valMin, valMax) {
	let scroll = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
	let ratio = (scroll - scrollMin) / (scrollMax - scrollMin);
	let val = valMin + ratio * (valMax - valMin);
	// console.log(val, valMax, valMin);
	return Math.min(Math.max(val, valMax), valMin);
}

function toggleLinks () {
	var links = document.getElementById(linksID);
	if (links.style.display == 'block') {
		links.style.display = 'none';
	} else {
		links.style.display = 'block';
	}
}

// START MAIN
main();