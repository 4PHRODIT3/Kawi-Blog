let nav_btn = document.getElementById("nav-toggler");

nav_btn.addEventListener("click", function () {
  if ($(".custom-nav").css("left") == "0px") {
    $(".custom-nav").animate({ left: "-100%" });
    this.childNodes[1].src = "/assets/icons/icons8-menu.svg";
  } else {
    $(".custom-nav").animate({ left: "0px" });
    this.childNodes[1].src = "/assets/icons/icons8-close-dark.svg";
  }
});

function showDetailArticle(ele) {
  let $article_url = ele.dataset["href"];
  window.location.href = $article_url;
}

let search_btn = document.getElementById("search-btn");
let modal = document.querySelector(".search-modal");
let cancel_btn = document.querySelector("#close-search-btn");
let client_screen_width = window.screen.width;

search_btn.addEventListener("click", function () {
  modal.classList.toggle("hide-modal");
  if (client_screen_width <= 1200) {
    $(".custom-nav").animate({ left: "-100%" });
    nav_btn.childNodes[1].src = "/assets/icons/icons8-menu.svg";
  }
});

cancel_btn.addEventListener("click", function () {
  modal.classList.add("hide-modal");
});

let nav = document.querySelector("nav");
let client_screen_height = window.screen.height;
window.addEventListener("scroll", function () {
  if (document.documentElement.scrollTop > client_screen_height - 200) {
    nav.classList.add("nav");
  } else {
    nav.classList.remove("nav");
  }
});
