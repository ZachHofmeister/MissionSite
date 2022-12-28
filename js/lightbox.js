var lightbox = document.getElementById("lightbox");
var lightboxClose = document.getElementsByClassName("close-lightbox")[0];
var lightboxImg = document.getElementById("main-img");

var images = document.querySelectorAll("img:not(.no-lightbox)");


//view image on click
Array.from(images).forEach(img => {
	img.onclick = function() {
		lightbox.style.display = "block";
		lightboxImg.src = img.src;
		lightboxImg.alt = img.alt;
	}
});

// document.getElementsByTagName("img")[0].onclick = function() {
// 	lightbox.style.display = "block";
// }



//close if click close button
lightboxClose.onclick = function() {
	lightbox.style.display = "none";
}

//Close if click outside lightbox
window.onclick = function(event) {
	if (event.target == lightbox) {
		lightbox.style.display = "none";
	}
  } 