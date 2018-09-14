//:: `plugin.js` used for proposal submission
$(function () {

  $('body').ready(function () {
    $("#myModal").css("display", "block");
  });

  $("#rd_yes").click(function () {
    $('.check_group').show();
    $('.check_bp').prop('disabled', false);
  });

  $("#rd_no").click(function () {
    $(".check_group").hide();
    $('.check_bp').prop('disabled', true);
  });

  $("#ajax_form").submit(function (event) {
    event.preventDefault();
    var radio = $(".radio_input:checked").val();
    var far = $("#chk_far:checked").val();
    var oe = $("#chk_oe:checked").val();

    if (radio == 'yes_bp') {

      $.ajax({
        type: 'POST',
        url: BASE_URL + 'submit',
        data: {
          radio: radio,
          far: far,
          oe: oe,
        },
        success: function (response) {
          $('body').html(response);
        },
        error: function (response) {
          alert("There was an error");
          location.reload();
        },
      });

    } else {
      $.ajax({
        type: 'POST',
        url: BASE_URL + 'submit',
        data: {
          radio: radio,
          far: far,
          oe: oe,
        },
        success: function (response) {
          $('body').html(response);
        },
        error: function (response) {
          alert("There was an error");
          location.reload();
        },
      });
    }
  });




});