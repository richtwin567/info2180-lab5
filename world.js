document.addEventListener("DOMContentLoaded", (e) => {
	var headerimg = document.createElement("img");
	headerimg.src = "undraw_connected_world_wuay.svg";
	headerimg.style.objectFit = "contain";
	headerimg.style.height = "7em";
	var head = document.getElementsByTagName("header");
	head.item(0).prepend(headerimg);

	var cntrySearchBtn = document.getElementById("lookup");
	cntrySearchBtn.addEventListener("click", (e) => {
		var input = document.getElementById("country");
		var query = input.value;
		var results = document.getElementById("result");
		fetch("http://localhost/info2180-lab5/world.php?country=" + query)
			.then((res) => res.text())
			.then((data) => (results.innerHTML = data));
	});
});
