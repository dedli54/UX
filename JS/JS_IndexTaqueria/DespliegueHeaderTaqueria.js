/* Esto hace que el header se esconda cuando haces scroll para abajo 
y vuela a aparecer cuando llegues hasta la parte de arriba de la pagina */

$(function () {
  $(window).scroll(function () {
    var winTop = $(window).scrollTop();
    if (winTop >= 30) {
      $("body").addClass("sticky-header");
    } else {
      $("body").removeClass("sticky-header");
    }
  });
});
