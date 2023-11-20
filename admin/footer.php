<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
const sidebar = document.getElementById("sidebar");

sidebar.addEventListener("click", function() {
  this.classList.toggle("active");
});
const checked = document.querySelector('.checked');
const unchecked = document.querySelector('.unchecked');
const check = document.querySelectorAll('.check');

checked.addEventListener('click', function() {
  check.forEach((e) => {
    e.checked = true;
  })
})
unchecked.addEventListener('click', function() {
  check.forEach((e) => {
    e.checked = false;
  })
})
</script>
</body>

</html>