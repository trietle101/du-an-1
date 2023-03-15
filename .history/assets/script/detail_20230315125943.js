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
      item.classList.remove("active");
    });
    item.classList.add("active");
  });
});
