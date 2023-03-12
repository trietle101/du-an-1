window.addEventListener("load", function () {
  // --- Menu ---
  const links = [...document.querySelectorAll(".nav__link")];
  links.forEach((item) => item.addEventListener("mouseenter", handleHoverLink));
  const line = document.createElement("div");
  line.classList = "line-effect";
  document.body.appendChild(line);

  function handleHoverLink(event) {
    const { left, top, width, height } = event.target.getBoundingClientRect();
    const offsetBottom = 5;
    line.style.width = `${width}px`;
    line.style.left = `${left}px`;
    line.style.top = `${top + height + offsetBottom}px`;
  }
  const menu = document.querySelector(".nav__list");
  menu.addEventListener("mouseleave", function () {
    line.style.width = 0;
  });

  const nav = document.querySelectorAll(".nav__link");
  nav.forEach((item) => {
    item.addEventListener("click", () => {
      nav.forEach((item) => {
        item.classList.remove("active");
      });
      item.classList.add("active");
    });
  });
});
