let inputs = document.querySelectorAll("input");
let errors = {
	"korisnicko_ime": [],
	"email": [],
	"lozinka": [],
	"lozinka_opet": [],
	"uloga": []
};

inputs.forEach((element) => {
	element.addEventListener("change", (e) => {
		let currentInput = e.target;
		let inputValue = currentInput.value;
		let inputName = currentInput.getAttribute("name");

		if (inputValue.length > 3) {
			errors[inputName] = [];

			switch(inputName) {
				case "korisnicko_ime":
				let ime = inputValue.trim();
				if (ime.length < 5) {
					errors[inputName].push("Korisničko ime mora sadržati barem 5 karaktera");
				}
				break;

				case "email":
				if(!validateEmail(inputValue)) {
					errors[inputName].push("Neispravna email adresa");
				}	
				break;

				case "lozinka_opet":
				if (document.querySelector("input[name='lozinka']").value !==  inputValue) {
					errors[inputName].push("Lozinke se ne podudaraju");
				}
			}
		} else {
			errors[inputName] = ["Polje ne moze imati manje od 4 karaktera"];
		}
		populateErrors();
	});
});

const populateErrors = () => {
	for(let elem of document.querySelectorAll("ul")) {
		elem.remove();
	}

	for(let key of Object.keys(errors)) {
		let input = document.querySelector(`input[name=${key}]`);
		let parentElement = input.parentElement
		let errorsElement = document.createElement("ul");
		parentElement.appendChild(errorsElement);

		errors[key].forEach(error => {
			let li = document.createElement("li");
			li.innerText = error;
			errorsElement.appendChild(li);
		});
	};
};

const validateEmail = email => {
	if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
		return true;
	}

	return false;
}