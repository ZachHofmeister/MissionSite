function main() {	
	try {
		document.querySelector('.navbar-toggle').addEventListener('click', toggleAction);
	} catch {
		console.error('No .navbar-toggle element found!');
	}
}

function toggleAction () {
	var navItems = document.querySelectorAll('.navbar-items');
	navItems.forEach(
		nav => nav.classList.toggle('toggle-show')
	);
}

// START MAIN
main();