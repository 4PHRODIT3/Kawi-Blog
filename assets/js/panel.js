$(".show-left-side-bar").click((_) => {
  $(".left-side-bar").animate({ marginLeft: "0" });
});

$(".close-left-side-bar").click((_) => {
  $(".left-side-bar").animate({ marginLeft: "-100%" });
});

$("#toggle-size").click(function () {
  var card = $(this).closest(".card");
  card.toggleClass("maximize-table");
  if (card.hasClass("maximize-table")) {
    $(this).children()[0].src = "/assets/icons/icons8-minimize-64.png";
  } else {
    $(this).children()[0].src = "/assets/icons/icons8-full-screen-64.png";
  }
});

// var client_screen_size = window.screen.height;
// var active_position = $(".active").offset().top;
// if (active_position > client_screen_size) {
//   var scroll_to = active_position - 350;
//   $(".left-side-bar").animate({
//     scrollTop: scroll_to,
//   });
// }

const setActiveSidebar = (_) => {
  let current_url = window.location.href;
  let nav_links = document.querySelectorAll(".nav-item-link");
  nav_links.forEach((link) => {
    if (link.href == current_url.split("?")[0]) {
      link.parentNode.classList.add("active");
    }
  });
};

function edit(element) {
  $(".hidden-form").show();
  let id = element.dataset["id"];
  let old_val = element.dataset["val"];
  let text_input = $("input[name='category_name']");
  let id_input = $("input[type='hidden']");

  id_input.val(id);

  text_input.val(old_val);
  text_input.focus();
  text_input.select();
}

function remove(element) {
  let id = element.dataset["id"];
  let title = element.previousElementSibling.dataset["val"];

  if (confirm(`Are you sure to delete category ${title}?`)) {
    window.location.href = "/category/manipulate/delete?id=" + id;
  }
}

setActiveSidebar();
