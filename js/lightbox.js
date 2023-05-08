var lightbox = document.getElementById("lightbox");
var lightboxClose = document.getElementById("lightbox-close");
var lightboxImg = document.getElementById("lightbox-img");
var lightboxCaption = document.getElementById("lightbox-cap");
var lightboxNext = document.getElementById("lightbox-next");
var lightboxPrev = document.getElementById("lightbox-prev");

var images = document.querySelectorAll("img:not(.no-lightbox)");
const taptype = ( window.ontouchstart === null ) ? 'touchend' : 'click';

//view image on click
Array.from(images).forEach(img => {
	img.addEventListener(taptype, function() {
		if (lightbox.style.display == "none") {
			lightbox.style.display = "block";
			lightboxImg.src = img.src;
			lightboxImg.alt = img.alt;
			//display caption in lightbox
			let captionElement = img.nextElementSibling;
			lightboxCaption.innerText = "";
			lightboxCaption.style.display = "none";
			if (captionElement && captionElement.classList.contains("caption")) {
				lightboxCaption.innerText = captionElement.innerText;
				lightboxCaption.style.display = "block";
			} else if ("caption" in img.dataset) {
				lightboxCaption.innerText = img.dataset.caption;
				lightboxCaption.style.display = "block";
			}
		}
	})
});

//close if click close button
lightboxClose.addEventListener(taptype, function() {
	lightbox.style.display = "none";
});

//Close if click outside lightbox
window.addEventListener(taptype, function(event) {
	if (event.target == lightbox) {
		lightbox.style.display = "none";
	}
});