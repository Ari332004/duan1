<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
const inputs = document.querySelectorAll("input[type='number']");
for (const input of inputs) {
  input.addEventListener("input", function() {
    let sl = parseInt(this.value, 10);

    if (isNaN(sl) || sl < 1) {
      sl = 1;
    }

    if (!isNaN(input.max) && sl > parseInt(input.max, 10)) {
      sl = parseInt(input.max, 10);
    }

    this.value = sl;
  });
}
</script>
<script src="main.js"></script>
</body>

</html>