$(document).ready(function () {
  var navPro = $(".bh-sidebar-menu");
  navPro.on("click", function (e) {
    showhideIcon(e);
  });
  function showhideIcon(e) {
    // Dom to callapse Content and Icon chewy up/down
    var collapseItem = $(e.target)
      .closest("div")
      .parent()
      .find(".bh-sidebar-content");
    var navIcon = $(e.target)
      .closest("div")
      .find(".bh-sidebar-menu-icon-right");
    //   Get attribute into dom collapse content
    if (collapseItem.attr("state") == "hide") {
      collapseItem.attr("state", "show");
    } else {
      collapseItem.attr("state", "hide");
    }

    // Show/hide icon chewy up / down
    navIcon.each((index, e) => {
      $(e).attr("style", "display: none !important");
    });
    if (collapseItem.attr("state") == "show") {
      $(navIcon[0]).attr("style", "display: none !important");
      $(navIcon[1]).attr("style", "display: block !important");
    } else {
      $(navIcon[1]).attr("style", "display: none !important");
      $(navIcon[0]).attr("style", "display: block !important");
    }
  }
  // Dom to btn nav toggle
  var btnNavToggle = $("#navbarToggle");

  function navbarToggle(e) {
    e.on("click", () => {
      $(".bh-sidebar").toggleClass("show");
      $(".bh-main").toggleClass("show");
    });
  }

  navbarToggle(btnNavToggle);
});
