window.addEventListener("load", function () {
  const buttonMinus = document.querySelector(".quantity-prev");
  const buttonPlus = document.querySelector(".quantity-next");
  const inputNumber = document.querySelector(".input-number");

  buttonPlus.addEventListener("click", function () {
    if (inputNumber.value >= 10) return 10;
    inputNumber.value = Number(inputNumber.value) + 1;
  });
  buttonMinus.addEventListener("click", function () {
    if (inputNumber.value <= 1) {
      return 1;
    }
    inputNumber.value = Number(inputNumber.value) - 1;
  });

  //
  let images = Array.from(document.getElementsByClassName("detail-image-item"));
  let mainImage = document.getElementById("image-main");

  images.forEach(function (image) {
    image.addEventListener("click", updateImage);
  });
  function updateImage(event) {
    let image = event.target;
    mainImage.src = image.src;
  }

  images.forEach((item) => {
    item.addEventListener("click", () => {
      images.forEach((item) => {
        item.classList.remove("is-active");
      });
      item.classList.add("is-active");
    });
  });
});
