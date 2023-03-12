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
