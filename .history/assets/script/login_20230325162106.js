// --- Login ---
const registerButton = document.querySelector("#register");
const loginButton = document.querySelector("#login");
const container = document.querySelector("#container");

registerButton.addEventListener("click", () => {
  container.classList.add("reight-panel-active");
});
loginButton.addEventListener("click", () => {
  container.classList.remove("reight-panel-active");
});

const registers = document.querySelector("#registers");
const nameInput = document.querySelector("#name");
const passInput = document.querySelector("#pass");
const rePassInput = document.querySelector("#re_pass");
const phoneInput = document.querySelector("#phone");
const emailInput = document.querySelector("#email");

function checkInputs() {
  if (
    nameInput.value.trim() === "" ||
    passInput.value.trim() === "" ||
    rePassInput.value.trim() === "" ||
    phoneInput.value.trim() === "" ||
    emailInput.value.trim() === ""
  ) {
    registers.classList.add("disabled");
  } else {
    registers.classList.remove("disabled");
  }
}

nameInput.addEventListener("keyup", checkInputs);
passInput.addEventListener("keyup", checkInputs);
rePassInput.addEventListener("keyup", checkInputs);
phoneInput.addEventListener("keyup", checkInputs);
emailInput.addEventListener("keyup", checkInputs);
