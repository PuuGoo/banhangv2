$(document).ready(function () {
  // Incre/decre quantity
  var btn_plus = $("input[name=btn_plus]");
  var btn_sub = $("input[name=btn_sub]");

  function incrementValue(e) {
    var fieldName = $(e.target).data("field");
    var parent = $(e.target).closest("form");
    var currentValue = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    if (!isNaN(currentValue)) {
      parent.find("input[name=" + fieldName + "]").val(currentValue + 1);
      currentValue += 1;
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
      currentValue = 0;
    }

    //   Post to file submit.php(Send post request to file submit.php)
    $.post(
      "submit",
      { id_sp: parent.find("input[name=id_sp]").val(), quantity: currentValue },
      function (data) {
        var id_sp = data.id_sp;
        var quantity = data.quantity;
        var amount = data.amount;

        var eleAmount = parent.parent().parent().find(".amount");
        eleAmount.text(amount);
      },
      "json"
    );
  }

  function decrementValue(e) {
    // Incre/decre quantity
    var btn_plus = $("input[name=btn_plus]");
    var btn_sub = $("input[name=btn_sub]");

    var fieldName = $(e.target).data("field");
    var parent = $(e.target).closest("form");
    var currentValue = parseInt(
      parent.find("input[name=" + fieldName + "]").val(),
      10
    );

    if (!isNaN(currentValue)) {
      parent.find("input[name=" + fieldName + "]").val(currentValue - 1);
      currentValue -= 1;
    } else {
      parent.find("input[name=" + fieldName + "]").val(0);
      currentValue = 0;
    }

    //   Post to file submit.php(Send post request to file submit.php)
    $.post(
      "submit",
      { id_sp: parent.find("input[name=id_sp]").val(), quantity: currentValue },
      function (data) {
        var id_sp = data.id_sp;
        var quantity = data.quantity;
        var amount = data.amount;

        var eleAmount = parent.parent().parent().find(".amount");
        eleAmount.text(amount);
      },
      "json"
    );
  }

  btn_plus.on("click", function (e) {
    incrementValue(e);
  });

  btn_sub.on("click", function (e) {
    decrementValue(e);
  });

  // Handle Checkbox
  var checkbox_all = $("#checkbox_all");
  var checkbox = checkbox_all.closest("table").find("input[name=checkbox]");
  function handleCheckboxAll(e) {
    if ($(e.target).is(":checked")) {
      checkbox.each((index, e) => {
        $("button[name=btn_checkout]").show();
        $(".mes").hide();
        $(e).prop("checked", true);
      });
    } else {
      checkbox.each((index, e) => {
        $("button[name=btn_checkout]").hide();
        $(".mes").show();
        $(e).prop("checked", false);
      });
    }
  }

  function handleCheckbox(e) {
    var checkbox_current = $(e.target);
    if (checkbox_all.is(":checked") && !checkbox_current.is(":checked")) {
      checkbox_all.prop("checked", false);
    } else {
      var count = 0;
      checkbox.each((index, e) => {
        if (!$(e).is(":checked")) {
          count++;
        }
      });
      if (count == 0) {
        checkbox_all.prop("checked", true);
      }
    }
  }

  checkbox_all.on("click", function (e) {
    handleCheckboxAll(e);
  });
  checkbox.on("click", function (e) {
    handleCheckbox(e);
  });

  var btn_delete = $("button[name=btn_delete]");
  function delete_item(e) {
    var btn_delete = $(e.target);
    var id_sp = btn_delete.closest("td").find("input[name=id_sp]").val();

    $.post(
      "submit",
      { delete_id_sp: id_sp },
      function (data) {
        console.log(data);
      },
      "json"
    );

    btn_delete.closest("tr").remove();
  }

  btn_delete.on("click", function (e) {
    delete_item(e);
  });

  $(document).on("change", function () {
    var count = 0;
    checkbox_all = $("#checkbox_all");
    checkbox = checkbox_all.closest("table").find("input[name=checkbox]");
    checkbox.each((index, e) => {
      var id_sp = $(e).closest("div").find("input[name=id_sp]").val();
      var state;

      if ($(e).is(":checked")) {
        state = true;
      } else {
        state = false;
        count++;
      }

      $.post(
        "submit",
        { id_sp: id_sp, state: state },
        function (data) {
          //   console.log(data.checkbox[id_sp]);
        },
        "json"
      );
    });

    if (count == checkbox.length) {
      checkbox_all.prop("checked", false);
      $(".mes").show();
      $("button[name=btn_checkout]").hide();
    } else if (count == 0) {
      checkbox_all.prop("checked", true);
    } else {
      checkbox_all.prop("checked", false);
      $(".mes").hide();
      $("button[name=btn_checkout]").show();
    }
  });
});
