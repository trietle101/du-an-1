const address = document.querySelector("#address");
const wards = document.querySelector("#wards");
const district = document.querySelector("#district");
const city = document.querySelector("#city");
const checkOut = document.querySelector("#checkout");

function checkAddress() {
  if (loginEmail.value.trim() === "" || loginPass.value.trim() === "") {
    logins.classList.add("disabled");
  } else {
    logins.classList.remove("disabled");
  }
}

loginEmail.addEventListener("keyup", checkInputs);
loginPass.addEventListener("keyup", checkInputs);
