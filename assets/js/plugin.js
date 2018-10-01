//:: `plugin.js` used for proposal submission
$(function () {

  if ($('#rd_ind').prop('checked')) {
    $("#partner_collab").prop('disabled', true);
    $("#partner_collab").val('');
    $("#collab-container").hide();
  }

  if ($('#rd_col').prop('checked')) {
    $("#partner_collab").prop('disabled', false);
    $("#collab-container").show();
  }

  if ($('#rd_acad').prop('checked')) {
    $(".non_acad").prop('disabled', true);
    $(".non_acad_rd").prop('disabled', true);
    $("#specified_ex").val('');
    $("#specified_co").val('');
    $("#rd_comm").prop('checked', false);
    $("#rd_cocur").prop('checked', false);
    $("#rd_excur").prop('checked', false);
    $(".rd-non-academic-container").hide();
    $("#extra-curricular").hide();
    $("#co-curricular").hide();
  }

  if ($('#rd_nacad').prop('checked')) {
    $(".non_acad_rd").prop('disabled', false);
    $(".rd-non-academic-container").show();
  }

  if ($('#rd_comm').prop('checked')) {
    $("#extra-curricular").hide();
    $("#specified_ex").prop('disabled', true);
    $("#specified_ex").val('');
    $("#co-curricular").hide();
    $("#specified_co").prop('disabled', true);
    $("#specified_co").val('');
  }

  if ($('#rd_cocur').prop('checked')) {
    $("#specified_co").prop('disabled', false);
    $("#co-curricular").show();

    $("#extra-curricular").hide();
    $("#specified_ex").prop('disabled', true);
    $("#specified_ex").val('');
  }

  if ($('#rd_excur').prop('checked')) {
    $("#specified_ex").prop('disabled', false);
    $("#extra-curricular").show();

    $("#co-curricular").hide();
    $("#specified_co").prop('disabled', true);
    $("#specified_co").val('');
  }

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

  //:: Proposal Type - 1 Independent radio button
  $("#rd_ind").click(function () {
    $("#partner_collab").prop('disabled', true);
    $("#partner_collab").val('');
    $("#collab-container").hide();
  });

  //:: Proposal Type - 1 Collaborative radio button
  $("#rd_col").click(function () {
    $("#partner_collab").prop('disabled', false);
    $("#collab-container").show();
  });

  //:: Proposal Type - 2 Academic radio button
  $("#rd_acad").click(function () {
    $(".non_acad").prop('disabled', true);
    $(".non_acad_rd").prop('disabled', true);
    $("#specified_ex").val('');
    $("#specified_co").val('');
    $("#rd_comm").prop('checked', false);
    $("#rd_cocur").prop('checked', false);
    $("#rd_excur").prop('checked', false);
    $(".rd-non-academic-container").hide();
    $("#extra-curricular").hide();
    $("#co-curricular").hide();
  });

  //:: Proposal Type - 2 Non-Academic radio button
  $("#rd_nacad").click(function () {
    $(".non_acad_rd").prop('disabled', false);
    $(".rd-non-academic-container").show();
  });

  $("#rd_comm").click(function () {
    $("#extra-curricular").hide();
    $("#specified_ex").prop('disabled', true);
    $("#specified_ex").val('');
    $("#co-curricular").hide();
    $("#specified_co").prop('disabled', true);
    $("#specified_co").val('');

  });

  //:: Non-Academic co-curricular radio button
  $("#rd_cocur").click(function () {
    $("#specified_co").prop('disabled', false);
    $("#co-curricular").show();

    $("#extra-curricular").hide();
    $("#specified_ex").prop('disabled', true);
    $("#specified_ex").val('');
  });

  //:: Non-Academic extra-curricular radio button
  $("#rd_excur").click(function () {
    $("#specified_ex").prop('disabled', false);
    $("#extra-curricular").show();

    $("#co-curricular").hide();
    $("#specified_co").prop('disabled', true);
    $("#specified_co").val('');
  });



  $("#ajax_form_modal").submit(function (event) {
    event.preventDefault();
    var radio = $(".radio_input:checked").val();
    var far = $("#chk_far:checked").val();
    var oe = $("#chk_oe:checked").val();

    //:: If there is bp
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
          alert(radio);
          alert(far);
          alert(oe);
          $('body').html(response);
        },
        error: function (response) {
          alert("There was an error");
          location.reload();
        },
      });

      //:: If no bp
    } else {
      $.ajax({
        type: 'POST',
        url: BASE_URL + 'submit',
        data: {
          radio: radio,
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

  $("#btn_save").click(function (event) {
    event.preventDefault();
    var proposal_id = $("#proposal_id").val();
    var activity_name = $("#activity_name").val();
    var date_activity = $("#date_activity").val();
    var start_time_activity = $("#start_time_activity").val();
    var end_time_activity = $("#end_time_activity").val();
    var contact_number = $("#contact_number").val();
    var nature = $("#nature_textarea").val();
    var rationale = $("#rationale_textarea").val();
    var activity_chair = $("#activity_chair").val();
    var participants = $("#participants_textarea").val();
    var activity_venue = $("#activity_venue").val();
    var proposal_type1 = $(".rd_proposal_type1:checked").val();
    var proposal_type2 = $(".rd_proposal_type2:checked").val();
    var non_academic_type = $(".non_acad_rd:checked").val();
    var collab_partner = $("#partner_collab").val();
    var specified_ex = $("#specified_ex").val();
    var specified_co = $("#specified_co").val();

    

    var flag = true;

    $.ajax({
      type: 'POST',
      url: BASE_URL + 'proposal/save',
      data: {
        flag: flag,
        proposal_id: proposal_id,
        activity_name: activity_name,
        date_activity: date_activity,
        start_time_activity: start_time_activity,
        end_time_activity: end_time_activity,
        contact_number: contact_number,
        nature: nature,
        rationale: rationale,
        activity_chair: activity_chair,
        participants: participants,
        activity_venue: activity_venue,
        proposal_type1: proposal_type1,
        proposal_type2: proposal_type2,
        non_academic_type: non_academic_type,
        collab_partner: collab_partner,
        specified_ex: specified_ex,
        specified_co: specified_co,
      },
      dataType: 'json',
      success: function (response) {
        if (response.success) {
          alert(specified_ex);
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

  $("#ajax_form_title").submit(function (event) {
    event.preventDefault();
    var activity_name = $("#activity_name").val();
    var proposal_id;
    $.ajax({
      type: 'POST',
      url: BASE_URL + 'proposal/create',
      data: {
        activity_name: activity_name
      },
      dataType: 'json',
      success: function (response) {
        proposal_id = response.proposal_id;
        window.location.replace(BASE_URL + "proposal/edit/" + proposal_id);
      },
      error: function (response) {
        alert("There was an error! " + response.proposal_id);
      },

    });
  });

  $("#ajax_form_activity").submit(function (event) {
    event.preventDefault();
    var proposal_id = $("#proposal_id").val();
    var activity_name = $("#activity_name").val();
    var date_activity = $("#date_activity").val();
    var start_time_activity = $("#start_time_activity").val();
    var end_time_activity = $("#end_time_activity").val();
    var nature = $("#nature_textarea").val();
    var rationale = $("#rationale_textarea").val();
    var activity_chair = $("#activity_chair").val();
    var contact_number = $("#contact_number").val();
    var participants = $("#participants_textarea").val();
    var activity_venue = $("#activity_venue").val();
    var proposal_type1 = $(".rd_proposal_type1:checked").val();
    var proposal_type2 = $(".rd_proposal_type2:checked").val();
    var non_academic_type = $(".non_acad_rd:checked").val();
    var collab_partner = $("#partner_collab").val();
    var specified_ex = $("#specified_ex").val();
    var specified_co = $("#specified_co").val();
    var flag = true;

    $.ajax({
      type: 'POST',
      url: BASE_URL + 'proposal/submit/' + proposal_id,
      data: {
        flag: flag,
        proposal_id: proposal_id,
        activity_name: activity_name,
        date_activity: date_activity,
        contact_number: contact_number,
        start_time_activity: start_time_activity,
        end_time_activity: end_time_activity,
        nature: nature,
        rationale: rationale,
        activity_chair: activity_chair,
        participants: participants,
        activity_venue: activity_venue,
        proposal_type1: proposal_type1,
        proposal_type2: proposal_type2,
        non_academic_type: non_academic_type,
        collab_partner: collab_partner,
        specified_ex: specified_ex,
        specified_co: specified_co,
      },
      success: function (response) {
        window.location.replace(BASE_URL + "submit/success/" + proposal_id);
      },
      error: function (response) {
        if (!response.success) {
          alert("There was an error" + response.success);
        }
      },
    });
  });
});