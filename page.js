// menu btn burger
$(document).ready(function () {
  $(".menu-btn-burger").click(function () {
    $(".nav-links").toggleClass("show");
  });
});
// Menu icon burger
const menuBtn = document.querySelector(".menu-btn-burger");
let menuOpen = false;
menuBtn.addEventListener("click", function () {
  if (!menuOpen) {
    menuBtn.classList.add("open");
    menuOpen = true;
  } else {
    menuBtn.classList.remove("open");
    menuOpen = false;
  }
});
// Navigation animation
const scrollAnimation = document.addEventListener("scroll", function () {
  var nav = document.querySelector("nav");
  nav.classList.toggle("sticky", window.scrollY > 300);
});
//faq
$(document).ready(function () {
  $(".first").click(function () {
    $(".first-answer").slideToggle("slow");
    $(".second-answer").hide();
    $(".third-answer").hide();
    $(".fourth-answer").hide();
    $(".fifth-answer").hide();
  });
  $(".second").click(function () {
    $(".second-answer").slideToggle("slow");
    $(".first-answer").hide();
    $(".third-answer").hide();
    $(".fourth-answer").hide();
    $(".fifth-answer").hide();
  });
  $(".third").click(function () {
    $(".third-answer").slideToggle("slow");
    $(".first-answer").hide();
    $(".second-answer").hide();
    $(".fourth-answer").hide();
    $(".fifth-answer").hide();
  });
  $(".fourth").click(function () {
    $(".fourth-answer").slideToggle("slow");
    $(".first-answer").hide();
    $(".second-answer").hide();
    $(".third-answer").hide();
    $(".fifth-answer").hide();
  });
  $(".fifth").click(function () {
    $(".fifth-answer").slideToggle("slow");
    $(".first-answer").hide();
    $(".second-answer").hide();
    $(".third-answer").hide();
    $(".fourth-answer").hide();
  });
});

// footer date update
$("#year_update").text(new Date().getFullYear());
