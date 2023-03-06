var lightbox = document.getElementById("lightbox");
var lightboxClose = document.getElementsByClassName("close-lightbox")[0];
var lightboxImg = document.getElementById("main-img");

var images = document.querySelectorAll("img:not(.no-lightbox)");
const taptype = ( window.ontouchstart === null ) ? 'touchend' : 'click';

//view image on click
Array.from(images).forEach(img => {
	img.addEventListener(taptype, function() {
		if (lightbox.style.display == "none") {
			lightbox.style.display = "block";
			lightboxImg.src = img.src;
			lightboxImg.alt = img.alt;
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