$(document).ready(function() {
  $("a.dd-menu").click(function() {
    $("ul.dropdown_list").toggleClass("active");
  });
  $(".dropdown_list").on("mouseleave", function() {
    $(this).removeClass("active");
  });
});

document.getElementById("button").addEventListener("click", function() {
  document.querySelector(".popup").style.display = "flex";
});

document.querySelector(".close").addEventListener("click", function() {
  document.querySelector(".popup").style.display = "none";
});
