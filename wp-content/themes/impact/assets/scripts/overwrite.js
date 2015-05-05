jQuery(document).ready(function($) {
  $(".dropdown.active").toggleClass("open", true).on("hide.bs.dropdown",function(e) {
    e.preventDefault();
    return false;
  });

  $(".dropdown-menu li").click(function(){
    $(".dropdown-menu li.active").removeClass("active");
    $("span.select-year-title").text($(this).find("a").text());
  });

  // $('.pill').click(function (e) {
  //   e.preventDefault();
  //   $(this).tab('show');
  // });
});