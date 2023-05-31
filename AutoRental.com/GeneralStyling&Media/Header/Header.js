document.querySelector(".menu-toggle").addEventListener("click", function () {
  this.classList.toggle("active");
  document.querySelector(".menu").classList.toggle("active");

  // Промяна на вида на бутона
  var spans = this.querySelectorAll("span");
  spans.forEach(function (span) {
    span.classList.toggle("change");
  });
});
