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
  }

  var checkboxValue = $("input[name=checkboxValue]").val();
  var checkboxValue_array = checkboxValue.split("&");
  var obj = new Object();

  checkboxValue_array.forEach((e, index) => {
    var new_e = e.split("=");
    obj[new_e[0]] = new_e[1];
  });
  showHide();
  btnCheckbox.each(function (index, e) {
    e.addEventListener("click", function () {
      var id_sp = e.getAttribute("id");
      // proSelected.each(function (index, e) {
      //   if (e.getAttribute("id_selected") == id_sp) {
      //     e.setAttribute("style", "display: block !important");
      //   }
      // });
      if (e.checked == true) {
        obj[id_sp] = "true";
        $.post("submit", { id_sp: id_sp, state: true });
      } else {
        obj[id_sp] = "false";
        $.post("submit", { id_sp: id_sp, state: false });
      }
    });
  });
  $(document).on("change", () => {
    showHide();
  });

  function showHide() {
    var count = 0;
    for (let key in obj) {
      if (obj[key] == "false") {
        count++;
      }
    }
    if (count == Object.entries(obj).length) {
      $(".scp-p-checkboxEmpty")[0].style.display = "block";
      $("button[name=btnCheckout]")[0].style.display = "none";
      $(".scp-p-productEmpty")[0].style.display = "block";
      $(".scp-p-items")[0].setAttribute("style", "display: none !important");
      $(".scp-pt-price").text(0 + " VND");
    } else {
      $(".scp-p-checkboxEmpty")[0].style.display = "none";
      $("button[name=btnCheckout]")[0].style.display = "block";
      $(".scp-p-productEmpty")[0].style.display = "none";
      $(".scp-p-items")[0].setAttribute("style", "display: flex !important");
    }
  }

  button_plus.on("click", function (e) {
    incrementValue(e);
    // location.reload();
  });

  button_sub.on("click", function (e) {
    decrementValue(e);
    // location.reload();
  });
});
