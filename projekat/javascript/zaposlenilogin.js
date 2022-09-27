function status() {
	window.open("statusAktivnosti.php", "_self");
}

function logout() {
	window.open('login.php', "_self");
}

function searchBar() {
	let input = document.querySelector("#searchbar").value;
	input = input.toLowerCase();
	let titles = document.querySelectorAll(".card-title");
	titles = Array.from(titles);
	for (let i = 0; i < titles.length; i++) {
		if (!titles[i].innerText.toLowerCase().includes(input)) {
			titles[i].parentElement.style.display="none";
		}
		else {
			titles[i].parentElement.style.display="block";
		}
	}

}

