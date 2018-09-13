var attempt = 4; // Login attempts
//:: Login Checker
$(document).ready(function () {

  $("#ajax_form").submit(function (event) {
    event.preventDefault();
    var $form = $(this);

    $.ajax({
      type: 'POST',
      url: BASE_URL + "/accounts/login",
      data: $form.serialize(),
      dataType: 'json',
      success: function (response) {
        if (response.success) {
          // alert("Pasok ka bes");
          window.location.replace("index");
        } else {
          // alert("Hindi ka pasok");
          attempt--;
          if (attempt <= 0) {
            window.location.replace("locked.html");
            $("#button").attr("disabled", "disabled");
            $("#button").css("background-color", "gray");
          } else {
            $("#button").effect("shake");
          }
        }
      },
      error: function (error) {
        attempt--;
        if (attempt <= 0) {
          window.location.replace("locked.html");
          $("#button").attr("disabled", "disabled");
          $("#button").css("background-color", "gray");
        } else {
          $("#button").effect("shake");
        }
      }
    });
  });
});