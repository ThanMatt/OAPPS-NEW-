//:: `plugin.js` used for proposal submission
var overall_total = 0;
var txtbox_counter = 0;
$(function () {

  var text_counter_oe = 2; // for adding text id number for every add field
  var text_counter_far = $('#fields_far tr').length; // for adding text id number for every add field
  var field_counter_oe = 0;
  var field_counter_far = 0;



  if ($('#rd_ind').prop('checked')) {
    $("#partner_collab").prop('disabled', true);
    $("#partner_collab").val('');

  }

  if ($('#rd_col').prop('checked')) {
    $("#partner_collab").prop('disabled', false);

  }

  if ($('#rd_acad').prop('checked')) {
    $(".non_acad").prop('disabled', true);
    $(".non_acad_rd").prop('disabled', true);
    $("#specified_ex").val('');
    $("#specified_co").val('');
    $("#rd_comm").prop('checked', false);
    $("#rd_cocur").prop('checked', false);
    $("#rd_excur").prop('checked', false);

  }

  if ($('#rd_nacad').prop('checked')) {
    $(".non_acad_rd").prop('disabled', false);
  }

  if ($('#rd_comm').prop('checked')) {
    $("#specified_ex").prop('disabled', true);
    $("#specified_ex").val('');
    $("#specified_co").prop('disabled', true);
    $("#specified_co").val('');
  }

  if ($('#rd_cocur').prop('checked')) {
    $("#specified_co").prop('disabled', false);

    $("#specified_ex").prop('disabled', true);
    $("#specified_ex").val('');
  }

  if ($('#rd_excur').prop('checked')) {
    $("#specified_ex").prop('disabled', false);

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
    $('.check_bp').prop('disabled', true);
  });

  //:: Proposal Type - 1 Independent radio button
  $("#rd_ind").click(function () {
    $("#partner_collab").prop('disabled', true);
    $("#partner_collab").val('');

  });

  //:: Proposal Type - 1 Collaborative radio button
  $("#rd_col").click(function () {
    $("#partner_collab").prop('disabled', false);
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
  });

  //:: Proposal Type - 2 Non-Academic radio button
  $("#rd_nacad").click(function () {
    $(".non_acad_rd").prop('disabled', false);
  });

  $("#rd_comm").click(function () {
    $("#specified_ex").prop('disabled', true);
    $("#specified_ex").val('');
    $("#specified_co").prop('disabled', true);
    $("#specified_co").val('');

  });

  //:: Non-Academic co-curricular radio button
  $("#rd_cocur").click(function () {
    $("#specified_co").prop('disabled', false);
    $("#specified_ex").prop('disabled', true);
    $("#specified_ex").val('');
  });

  //:: Non-Academic extra-curricular radio button
  $("#rd_excur").click(function () {
    $("#specified_ex").prop('disabled', false);

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

  //:: Saving Activity Proposal
  $("#btn_save_ap").click(function (event) {
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
      url: BASE_URL + 'proposal/save_ap',
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

  //:: Saving FAR
  $("#btn_save_far").click(function (event) {
    event.preventDefault();
    var proposal_id = $("#proposal_id").val();
    // var far_item = $("#far_txt_item1").val();
    // var far_quantity = $("#far_txt_quantity1").val();
    // var far_unit = $("#far_txt_unit1").val();
    // var far_total_amount = $("#far_txt_total1").val();
    // var far_source = $("#far_source_of_fund1").val();

    var far_item = $("input[name='far_item[]']")
      .map(function () { return $(this).val(); }).get();
    var far_quantity = $("input[name='far_quantity[]']")
      .map(function () { return $(this).val(); }).get();
    var far_unit = $("input[name='far_unit_price[]']")
      .map(function () { return $(this).val(); }).get();
    var far_total_amount = $("input[name='far_total_amount[]']")
      .map(function () { return $(this).val(); }).get();
    var far_source = $("select[name='far_source[]']")
      .map(function () { return $(this).val(); }).get();
    var far_id = $("input[name='far_id[]']")
      .map(function () { return $(this).val(); }).get();

    var flag = true;

    $.ajax({
      type: 'POST',
      url: BASE_URL + 'proposal/save_far',
      data: {
        proposal_id: proposal_id,
        far_item: far_item,
        far_quantity: far_quantity,
        far_unit: far_unit,
        far_total_amount: far_total_amount,
        far_source: far_source,
        far_id: far_id,
      },
      dataType: 'json',
      success: function (response) {
        if (response.success) {
          alert("Save successful!");
        }
      },
      error: function (response) {
        if (!response.success) {
          alert("There was an error saving FAR. Please try again");
        }
      },
    });
  });

  //:: Saving OE
  $("#btn_save_oe").click(function (event) {
    event.preventDefault();
    var proposal_id = $("#proposal_id").val();
    var oe_item = $("#oe_txt_item1").val();
    var oe_quantity = $("#oe_txt_quantity1").val();
    var oe_unit = $("#oe_txt_unit1").val();
    var oe_total_amount = $("#oe_txt_total1").val();
    var oe_source = $("#oe_source_of_fund1").val();

    var flag = true;

    $.ajax({
      type: 'POST',
      url: BASE_URL + 'proposal/save_oe',
      data: {
        proposal_id: proposal_id,
        oe_item: oe_item,
        oe_quantity: oe_quantity,
        oe_unit: oe_unit,
        oe_total_amount: oe_total_amount,
        oe_source: oe_source,
      },
      dataType: 'json',
      success: function (response) {
        if (response.success) {
          alert("Save successful!");
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

  //:: Add button for FAR
  $('#button-add-far').click(function () {
    var far_id = Math.floor((Math.random() * 9999) + 1000);
    var txtbox = [
      text_counter_far,
      // "<input type='text' class='form-control form-control-sm medium-text-box far-item' name='far_item" + text_counter_far + "' id='far_txt_item" + text_counter_far + "' required>",
      // "<input type='number' class='form-control form-control-sm small-text-box far-quantity' name='far_quantity" + text_counter_far + "' id='far_txt_quantity" + text_counter_far + "' min=0 value=0 oninput='calculate(this.id)' required>",
      // "<input type='number' class='form-control form-control-sm small-text-box far-unit' name='far_unit_price" + text_counter_far + "' id='far_txt_unit" + text_counter_far + "' step='any' min=0 value=0 oninput='calculate(this.id)' required>",
      // "<input type='number' class='form-control form-control-sm small-text-box far-total' name='far_total_amount" + text_counter_far + "' id='far_txt_total" + text_counter_far + "' value=0.00 readonly required>",
      // "<select name='far_source_of_fund" + text_counter_far + "' class='form-control medium-text-box far-source'><option>Student Activity Fund</option><option>Cultural Fund</option><option>Organizational Fund</option><option>Batch Fund</option><option>Publication Fund</option><option>Athletics Fund</option></select>",
      // "<input type='text' class='form-control form-control-sm far-id' name='far_id' " + text_counter_far + " id='far_txt_id' " + text_counter_far + " value= " + far_id + " required readonly />",
      "<input type='text' class='form-control form-control-sm medium-text-box far-item' name='far_item[]' id='far_txt_item" + text_counter_far + "' required>",
      "<input type='number' class='form-control form-control-sm small-text-box far-quantity' name='far_quantity[]' id='far_txt_quantity" + text_counter_far + "' min=0 value=0 oninput='calculate(this.id)' required>",
      "<input type='number' class='form-control form-control-sm small-text-box far-unit' name='far_unit_price[]' id='far_txt_unit" + text_counter_far + "' step='any' min=0 value=0 oninput='calculate(this.id)' required>",
      "<input type='number' class='form-control form-control-sm small-text-box far-total' name='far_total_amount[]' id='far_txt_total" + text_counter_far + "' value=0.00 readonly required>",
      "<select name='far_source[]' class='form-control medium-text-box far-source'><option>Student Activity Fund</option><option>Cultural Fund</option><option>Organizational Fund</option><option>Batch Fund</option><option>Publication Fund</option><option>Athletics Fund</option></select>",
      "<input type='text' class='form-control form-control-sm far-id' name='far_id[]' id='far_txt_id' " + text_counter_far + " value= " + far_id + " hidden required readonly />"


    ];

    var cell = new Array(7);
    var table = document.getElementById("fields_far");
    var row = table.insertRow(text_counter_far);
    // field_counter_far++;

    for (counter = 0; counter < cell.length; counter++) {
      cell[counter] = row.insertCell(counter);
    }

    for (counter = 0; counter < txtbox.length; counter++) {
      cell[counter].innerHTML = txtbox[counter];
    }
    text_counter_far++;
  });

  //:: Delete button for FAR
  $('#button-delete-far').click(function () {
    if (text_counter_far == 2) {
      return 0;
    } else {
      var table = document.getElementById("fields_far");

      table.deleteRow(text_counter_far - 1);

      // field_counter_far--;
      text_counter_far--;
    }
  });

  //:: Add button for OE
  $('#button-add-oe').click(function () {
    var oe_id = Math.floor((Math.random() * 9999) + 1000);
    var txtbox = [
      text_counter_oe,
      "<input type='text' class='form-control form-control-sm medium-text-box' name='oe_item" + text_counter_oe + "' id='far_txt_item" + text_counter_oe + "' required>",
      "<input type='number' class='form-control form-control-sm small-text-box' name='oe_quantity" + text_counter_oe + "' id='far_txt_quantity" + text_counter_oe + "' min=0 value=0 oninput='calculate(this.id)' required>",
      "<input type='number' class='form-control form-control-sm small-text-box' name='oe_unit_price" + text_counter_oe + "' id='far_txt_unit" + text_counter_oe + "' step='any' min=0 value=0 oninput='calculate(this.id)' required>",
      "<input type='number' class='form-control form-control-sm small-text-box' name='oe_total_amount" + text_counter_oe + "' id='far_txt_total" + text_counter_oe + "' value=0.00 readonly required>",
      "<select name='oe_source_of_fund" + text_counter_oe + "' class='form-control medium-text-box'><option>Student Activity Fund</option><option>Cultural Fund</option><option>Organizational Fund</option><option>Batch Fund</option><option>Publication Fund</option><option>Athletics Fund</option></select>",
      "<input type='text' class='form-control form-control-sm oe-id' name='oe_id' " + text_counter_oe + " id='oe_txt_id' " + text_counter_oe + " value= " + oe_id + " hidden required readonly />"
    ];

    var cell = new Array(7);
    var table = document.getElementById("fields_oe");
    var row = table.insertRow(2 + field_counter_oe);
    field_counter_oe++;

    for (counter = 0; counter < cell.length; counter++) {
      cell[counter] = row.insertCell(counter);
    }

    for (counter = 0; counter < txtbox.length; counter++) {
      cell[counter].innerHTML = txtbox[counter];
    }
    text_counter_oe++;
  });

  $('#button-delete-oe').click(function () {
    if (text_counter_oe == 2) {
      return 0;
    } else {
      var table = document.getElementById("fields_oe");

      table.deleteRow(field_counter_oe + 1);

      field_counter_oe--;
      text_counter_oe--;
    }
  });
});

//:: For FAR
function calculate(textbox) {
  var number_id = textbox.slice(-1);

  var quantity = document.getElementById("far_txt_quantity" + number_id).value;
  var unit_price = document.getElementById("far_txt_unit" + number_id).value;
  var total_amount = document.getElementById("far_txt_total" + number_id);
  var overall_amount = document.getElementById("far_overall_amount");
  var calculated_amount = quantity * unit_price;

  calculated_amount = calculated_amount.toFixed(2);
  total_amount.value = calculated_amount;

}

//:: For Operating Expenses
function calculate2(textbox) {
  var number_id = textbox.slice(-1);

  var quantity = document.getElementById("oe_txt_quantity" + number_id).value;
  var unit_price = document.getElementById("oe_txt_unit" + number_id).value;
  var total_amount = document.getElementById("oe_txt_total" + number_id);
  var overall_amount = document.getElementById("oe_overall_amount");
  var calculated_amount = quantity * unit_price;

  calculated_amount = calculated_amount.toFixed(2);
  total_amount.value = calculated_amount;

}