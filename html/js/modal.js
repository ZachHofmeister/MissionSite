var modal = document.getElementById("modal");
var modalClose = document.getElementById("modal-close");
var modalOpen = document.querySelectorAll(".modal-open");
const taptype = ( window.ontouchstart === null ) ? 'touchend' : 'click';

//view image on click
Array.from(modalOpen).forEach(button => {
	button.addEventListener(taptype, function() {
		if (modal.style.display == "none") {
			modal.style.display = "block";
		}
	})
});

//close if click close button
modalClose.addEventListener(taptype, function() {
	modal.style.display = "none";
});

//Close if click outside lightbox
window.addEventListener(taptype, function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
});