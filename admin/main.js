const sidebar = document.getElementById("sidebar");

sidebar.addEventListener("click", function () {
  this.classList.toggle("active");
});
const checked = document.querySelector(".checked");
const unchecked = document.querySelector(".unchecked");
const check = document.querySelectorAll(".check");

checked.addEventListener("click", function () {
  check.forEach((e) => {
    e.checked = true;
  });
});
unchecked.addEventListener("click", function () {
  check.forEach((e) => {
    e.checked = false;
  });
});

const navItems = document.querySelectorAll(".nav-item");
const navLinks = document.querySelectorAll(".nav-link");

console.log(navItems);
console.log(navLinks);
navItems.forEach((item) => {
  item.addEventListener("click", function () {
    navLinks.forEach((link) => {
      link.classList.remove("active");
      link.target.classList.add("active");
    });
  });
});
