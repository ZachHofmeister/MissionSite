import Mustache from '../modules/mustache.js';

async function main() {
	// await setupView(); //This is so that the mustache.js posts load before they are "linked" by setupRecentPosts
	setupRecentPosts();
}

// async function setupView() {
// 	let dataReq = await fetch('/_data/post-preview.json');
//     let templateReq = await fetch('/views/post-preview.html');

// 	let data = await dataReq.json();
// 	let template = await templateReq.text();

//     var content = Mustache.render(template, data);
// 	document.getElementById('post-previews').innerHTML = content;
// }

function setupRecentPosts() {
	Array.prototype.forEach.call(document.getElementsByClassName("post"),
		p => {
			p.onclick = function(){window.location.assign(p.dataset.href)};
		}
	);
}

main();
