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
