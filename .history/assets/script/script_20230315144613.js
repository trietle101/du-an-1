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
  //fixed-menu
  function debounceFn(func, wait, immediate) {
    let timeout;
    return function () {
      let context = this,
        args = arguments;
      let later = function () {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      let callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  }
  const header = document.querySelector(".header");
  const headerHeight = header && header.offsetHeight;
  window.addEventListener(
    "scroll",
    debounceFn(function (e) {
      const scrollY = window.pageYOffset;
      if (scrollY >= headerHeight) {
        header && header.classList.add("is-fixed");
        document.body.style.paddingTop = `${headerHeight}px`;
        // if (header) {
        //   header.classList.add("is-fixed");
        // }
      } else {
        header && header.classList.remove("is-fixed");
        document.body.style.paddingTop = 0;
      }
    }, 100)
  );
});
