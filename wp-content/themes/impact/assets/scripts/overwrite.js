jQuery(document).ready(function($) {
  $(".dropdown.active").toggleClass("open", true).on("hide.bs.dropdown",function(e) {
    e.preventDefault();
    return false;
  });

  // $('.pill').click(function (e) {
  //   e.preventDefault();
  //   $(this).tab('show');
  // });
});