let params = new URLSearchParams(document.location.search);
let nl_date = params.get("date").replace("-", "/");
document.getElementById("nl-footer").innerHTML = `
	<div class="page-item w2 text-right vert-center" style="padding: 0;">
		<h4 style="padding: 0 2%;">
			<a href="mailto:zachhof21@gmail.com" class="no-decor">zachhof21@gmail.com</a><br>
		</h4>
	</div>
	<div class="page-item text-left vert-center" style="padding: 0;">
		<a href="https://www.focus.org" target="_blank" style="padding: 0 4%;">
			<img class="contain no-lightbox" src="/${nl_date}/images/focus.png" alt="FOCUS logo">
		</a>
	</div>
	<div class="page-item text-left vert-center" style="padding: 0;">
		
	</div>
`;