window.addEventListener("load", function () {
  const buttonMinus = document.querySelectorAll(".cart-prev");
  const buttonPlus = document.querySelectorAll(".cart-next");
  const inputNumber = document.querySelectorAll(".input-number");
  const item = document.querySelector(".item");

  buttonPlus.addEventListener("click", function () {
    if (inputNumber.value >= 10) return 10;
    inputNumber.value = Number(inputNumber.value) + 1;
  });
  buttonMinus.addEventListener("click", function () {
    if (inputNumber.value <= 1) {
      item.style.display = "none";
      //   return 1;
    }
    inputNumber.value = Number(inputNumber.value) - 1;
  });
});