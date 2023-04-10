// --- Login ---
window.addEventListener("load", function () {
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

  function checkRegisters() {
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

  nameInput.addEventListener("keyup", checkRegisters);
  passInput.addEventListener("keyup", checkRegisters);
  rePassInput.addEventListener("keyup", checkRegisters);
  phoneInput.addEventListener("keyup", checkRegisters);
  emailInput.addEventListener("keyup", checkRegisters);

  const logins = document.querySelector("#logins");
  const loginEmail = document.querySelector("#login-email");
  const loginPass = document.querySelector("#login-pass");

  function checkInputs() {
    if (loginEmail.value.trim() !== "" && loginPass.value.trim() !== "") {
      logins.classList.remove("disabled");
    } else {
      logins.classList.add("disabled");
    }
  }

  loginEmail.addEventListener("keyup", checkInputs);
  loginPass.addEventListener("keyup", checkInputs);
});
