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

  //detail
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
    let images = Array.from(
      document.getElementsByClassName("detail-image-item")
    );
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
});