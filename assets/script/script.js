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
  const header = document.querySelector(".header-nav");
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

  const menuToggle = document.querySelector(".header-toggle");
  const menuHeader = document.querySelector(".header-menu");
  const expandClass = "is-expand";
  menuToggle.addEventListener("click", function () {
    menuHeader.classList.add(expandClass);
  });
  window.addEventListener("click", function (e) {
    if (!menuHeader.contains(e.target) && !e.target.matches(".header-toggle")) {
      menuHeader.classList.remove(expandClass);
    }
  });

  const dropdownSelect = document.querySelector(".dropdown__user");
  const dropdownItems = document.querySelectorAll(".dropdown__item");
  const dropdownSelected = document.querySelector(".dropdown__selected");
  const dropdownList = document.querySelector(".dropdown__list");
  const dropdown = document.querySelector(".dropdown");
  const dropdownCaret = document.querySelector(".dropdown__caret");
  // Dropdown select
  dropdownSelect.addEventListener("click", function (event) {
    dropdownList.classList.toggle("show");
    dropdownCaret.classList.toggle("fa-caret-up");
  });
  // Dropdown item
  dropdownItems.forEach((item) =>
    item.addEventListener("click", function (event) {
      const text = event.target.querySelector(".dropdown__text").textContent;
      dropdownSelected.textContent = text;
      dropdownList.classList.remove("show");
    })
  );
  // Click to document
  document.addEventListener("click", function (e) {
    if (!dropdown.contains(e.target)) {
      dropdownList.classList.remove("show");
    }
  });
});
