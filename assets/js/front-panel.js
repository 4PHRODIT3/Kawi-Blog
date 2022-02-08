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
