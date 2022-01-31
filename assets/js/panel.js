$(".show-left-side-bar").click((_) => {
  $(".left-side-bar").animate({ marginLeft: "0" });
});

$(".close-left-side-bar").click((_) => {
  $(".left-side-bar").animate({ marginLeft: "-100%" });
});
$(function () {
  $('[data-toggle="popover"]').popover();
});

$("#toggle-size").click(function () {
  var card = $(this).closest(".card");
  card.toggleClass("maximize-table");
  if (card.hasClass("maximize-table")) {
    $(this).html("<i class='feather feather-minimize-2'></i>");
  } else {
    $(this).html("<i class='feather feather-maximize-2'></i>");
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
