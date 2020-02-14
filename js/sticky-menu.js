document.addEventListener("DOMContentLoaded", function() {
  window.onscroll = function() {
    myFunction();
  };

  var navbar = document.getElementById("main-menu");

  var sticky = navbar.offsetTop;
  console.log(sticky);

  function myFunction() {
    if (window.pageYOffset > sticky) {
      navbar.classList.add("sticky");
    } else {
      navbar.classList.remove("sticky");
    }
  }
});
