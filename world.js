document.addEventListener("DOMContentLoaded", (e) => {
	var headerimg = document.createElement("img");
	headerimg.src = "undraw_connected_world_wuay.svg";
	headerimg.style.objectFit = "contain";
	headerimg.style.height = "7em";
	var head = document.getElementsByTagName("header");
	head.item(0).prepend(headerimg);

    var cntrySearchBtn = document.getElementById("lookup");
    cntrySearchBtn.innerHTML = "Lookup Country";
	cntrySearchBtn.addEventListener("click", (e) => {
		var input = document.getElementById("country");
		var query = input.value;
		var results = document.getElementById("result");
		fetch("http://localhost/info2180-lab5/world.php?countries=" + query+"&context=countries")
			.then((res) => res.text())
			.then((data) => (results.innerHTML = data));
    });
    
    var citySearchBtn = document.createElement("button");
    citySearchBtn.id = "lookup-city";
    citySearchBtn.innerHTML = "Lookup Cities"

    citySearchBtn.addEventListener("click", e=>{
        var input = document.getElementById("country");
		var query = input.value;
        var results = document.getElementById("result");
        fetch("http://localhost/info2180-lab5/world.php?cities=" + query+"&context=cities")
			.then((res) => res.text())
			.then((data) => (results.innerHTML = data));
    });

    cntrySearchBtn.parentElement.appendChild(citySearchBtn);
});
