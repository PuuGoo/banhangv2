$(document).ready(function () {
  var button_plus = $(".button-plus");
  var button_sub = $(".button-sub");
  var btnCheckbox = $(".form-check-input");
  function incrementValue(e) {
    var fieldName = $(e.target).data("field");
    var parent = $(e.target).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );
    var id_sp = parent.find("input[name=" + fieldName + "]").attr("id");

    var parentPP = parent.parent().parent().parent();
    var eleprice = parentPP.find(".sc-ic-price");
    var price = parseInt(eleprice[0].innerText.split(".").join(""));
    var pricePerUnit = price / currentVal;
    var eleCheckboxChecked = parentPP.find(".form-check-input");

    if (!isNaN(currentVal)) {
      parent.find("input[name=" + fieldName + "]").val(currentVal + 1);
      currentVal += 1;
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }

    eleprice[0].innerText = (pricePerUnit * currentVal).toLocaleString("vi-VN");

    $.post("submit", { quantity: currentVal, id_sp: id_sp }, function (data) {
      //   $("#formCart")[0].reset();
    });
    location.reload();
  }

  function decrementValue(e) {
    var fieldName = $(e.target).data("field");
    var parent = $(e.target).closest("div");
    var currentVal = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    var id_sp = parent.find("input[name=" + fieldName + "]").attr("id");

    var parentPP = parent.parent().parent().parent();
    var eleprice = parentPP.find(".sc-ic-price");
    var price = parseInt(eleprice[0].innerText.split(".").join(""));
    var pricePerUnit = price / currentVal;
    if (!isNaN(currentVal) && currentVal >= 1) {
      parent.find("input[name=" + fieldName + "]").val(currentVal - 1);
      currentVal -= 1;
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
    }

    eleprice[0].innerText = (pricePerUnit * currentVal).toLocaleString("vi-VN");

    $.post("submit", { quantity: currentVal, id_sp: id_sp }, function (data) {
      //   $("#formCart")[0].reset();
    });
    location.reload();
  }

  btnCheckbox.each(function (index, e) {
    e.addEventListener("click", function () {
      var id_sp = e.getAttribute("id");
      if (e.checked == true) {
        $.post("submit", { id_sp: id_sp, state: true }, function (data) {});
        location.reload();
      } else {
        $.post("submit", { id_sp: id_sp, state: false });
        location.reload();
      }
    });
  });
  button_plus.on("click", function (e) {
    incrementValue(e);
  });

  button_sub.on("click", function (e) {
    decrementValue(e);
  });
});
