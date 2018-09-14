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

  $("#ajax_form_modal").submit(function (event) {
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

  $("#ajax_form_activity").submit(function (event) {
    event.preventDefault();
    // var proposal_id = Math.floor((Math.random() * 9999) + 1000);
    var activity_name = $("#activity_name").val();
    var date_activity = $("#date_activity").val();
    var start_time_activity = $("#start_time_activity").val();
    var end_time_activity = $("#end_time_activity").val();
    var nature = $("#nature_textarea").val();
    var rationale = $("#rationale_textarea").val();
    var activity_chair = $("#activity_chair").val();
    var participants = $("#participants_textarea").val();
    var activity_venue = $("#activity_venue").val();
    var flag = true;

    $.ajax({
      type: 'POST',
      url: BASE_URL + 'proposals/save',
      data: {
        flag: flag,
        activity_name: activity_name,
        date_activity: date_activity,
        start_time_activity: start_time_activity,
        end_time_activity: end_time_activity,
        nature: nature,
        rationale: rationale,
        activity_chair: activity_chair,
        participants: participants,
        activity_venue: activity_venue
      },
      dataType: 'json',
      success: function(response) {
        if (response.success) {
          alert("Save successful!");
        } else {
          alert("There was an error");
        }
      },
      error: function (response) {
        if (!response.success) {
          alert("There was an error");
        }
      },
    });
  });




});