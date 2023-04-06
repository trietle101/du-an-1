const address = document.querySelector("#address");
const wards = document.querySelector("#wards");
const district = document.querySelector("#district");
const city = document.querySelector("#city");
const checkOut = document.querySelector("#checkout");

function checkAddress() {
  if (
    address.value.trim() === "" ||
    wards.value.trim() === "" ||
    district.value.trim() === "" ||
    city.value.trim() === ""
  ) {
    checkOut.classList.add("disabled");
  } else {
    checkOut.classList.remove("disabled");
  }
}

loginEmail.addEventListener("keyup", checkInputs);
loginPass.addEventListener("keyup", checkInputs);
