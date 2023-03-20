const allSideMenu = document.querySelectorAll("#sidebar .side-menu.top li a");

allSideMenu.forEach((item) => {
  const li = item.parentElement;

  item.addEventListener("click", function () {
    allSideMenu.forEach((i) => {
      i.parentElement.classList.remove("active");
    });
    li.classList.add("active");
  });
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector("#content nav .bx.bx-menu");
const sidebar = document.getElementById("sidebar");

menuBar.addEventListener("click", function () {
  sidebar.classList.toggle("hide");
});

//Dropdown
const dropdownSelect = document.querySelector(".dropdown__select");
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

const searchButton = document.querySelector(
  "#content nav form .form-input button"
);
const searchButtonIcon = document.querySelector(
  "#content nav form .form-input button .bx"
);
const searchForm = document.querySelector("#content nav form");

searchButton.addEventListener("click", function (e) {
  if (window.innerWidth < 576) {
    e.preventDefault();
    searchForm.classList.toggle("show");
    if (searchForm.classList.contains("show")) {
      searchButtonIcon.classList.replace("bx-search", "bx-x");
    } else {
      searchButtonIcon.classList.replace("bx-x", "bx-search");
    }
  }
});

if (window.innerWidth < 768) {
  sidebar.classList.add("hide");
} else if (window.innerWidth > 576) {
  searchButtonIcon.classList.replace("bx-x", "bx-search");
  searchForm.classList.remove("show");
}

window.addEventListener("resize", function () {
  if (this.innerWidth > 576) {
    searchButtonIcon.classList.replace("bx-x", "bx-search");
    searchForm.classList.remove("show");
  }
});

const switchMode = document.getElementById("switch-mode");

switchMode.addEventListener("change", function () {
  if (this.checked) {
    document.body.classList.add("dark");
  } else {
    document.body.classList.remove("dark");
  }
});

const inputAvatar = document.getElementById("avatar");
const avatarView = document.getElementById("avatar-view");

inputAvatar.addEventListener("change", function () {
  const avatar = this.files[0];
  if (avatar) {
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      avatarView.setAttribute("src", reader.result);
    });
    reader.readAsDataURL(avatar);
  } else {
    avatarView.setAttribute("src", "");
  }
});
