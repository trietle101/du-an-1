let images = Array.from(document.getElementsByClassName("detail-image-item"));
let mainImage = document.getElementById("image-main");

images.forEach(function (image) {
  image.addEventListener("click", updateImage);
});
function updateImage(event) {
  let image = event.target;
  mainImage.src = image.src;
}
