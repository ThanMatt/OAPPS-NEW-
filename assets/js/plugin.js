var text_counter_oe = 2; // for adding text id number for every add field
var text_counter_far = 2; // for adding text id number for every add field
var field_counter_oe = 0;
var field_counter_far = 0;
var overall_total = 0;
var txtbox_counter = 0;

//:: jQuery + ajax
$(function () {
  //:: Saves inputs from Activity Proposal page
  $('#next_btn_ap').click(function (event) {
    event.preventDefault();

    var activity_name2 = $('#activity_name').val();
    var date_activity2 = $('#date_activity').val();
    var start_time_activity2 = $('#start_time_activity').val();
    var end_time_activity2 = $('#end_time_activity').val();
    var nature2 = $('#nature_textarea').val();
    var rationale2 = $('#rationale_textarea').val();
    var activity_chair2 = $('#activity_chair').val();
    var participants2 = $('#participants_textarea').val();
    var venue2 = $('#activity_venue').val();
    var proposal2 = 'AP';


    $('.field_ap').each(function () {
      var id = $(this).attr('id');
      var value = $(this).val();
      sessionStorage.setItem(id, value);
    });

    $.ajax({
      type: 'POST',
      url: 'proposal.php',
      data: {
        check_ap: checking(),
      },

      success: function (data) {

        $.ajax({
          type: 'POST',
          url: 'save.php',
          data: {
            activity_name: activity_name2,
            date_activity: date_activity2,
            start_time_activity: start_time_activity2,
            end_time_activity: end_time_activity2,
            nature: nature2,
            rationale: rationale2,
            activity_chair: activity_chair2,
            participants: participants2,
            venue: venue2,
            proposal: proposal2
          },
          success: function (data) {
            window.location.replace("budget_proposal.php")
          },
          error: function (error) {
            alert("There was an error!");
          }

        });
      }

    });
  });

  //:: Saves inputs from Budget Proposal page
  $('#back_btn_bp').click(function (event) {
    event.preventDefault();

    // checkInputs();

    var data = checkInputs();

    ap = data.ap;
    far = data.far;
    oe = data.oe;

    $('.field_oe').each(function () {
      var id = $(this).attr('id');
      var value = $(this).val();
      sessionStorage.setItem(id, value);
    });

    $('.field_far').each(function () {
      var id = $(this).attr('id');
      var value = $(this).val();
      sessionStorage.setItem(id, value);
    });

    $.ajax({
      type: 'POST',
      url: 'budget_proposal.php',
      data: {
        check_bp: checking()
      },
      success: function (data) {

        $.ajax({
          type: 'POST',
          url: 'save.php',
          data: getBPData(far, oe),
          success: function (data) {
            window.location.replace("proposal.php")
          },
          error: function (error) {
            alert("There was an error in your BP")
          }
        });

      },
    });
  });

  $('#office_btn_next_ap').click(function (event) {
    event.preventDefault();

    var href = $('#a_view').attr('href');
    var proposal_id = href.split('=')[1];

    $.ajax({
      type: 'POST',
      url: 'save.php',
      data: {
        check: false
      },
      success: function (data) {
        window.location.replace("view.php?id=" + proposal_id)
      },
      error: function (error) {
        alert("There was an error moving to bp")
      }
    });
  });

  $('#btn_next_ap').click(function (event) {
    event.preventDefault();

    var href = $('#a_view').attr('href');
    var proposal_id = href.split('=')[1];

    $.ajax({
      type: 'POST',
      url: 'save.php',
      data: {
        check: false
      },
      success: function (data) {
        window.location.replace("org_view.php?id=" + proposal_id)
      },
      error: function (error) {
        alert("There was an error moving to bp")
      }
    });
  });

  $('#btn_next_bp').click(function (event) {
    event.preventDefault();

    var href = $('#a_view').attr('href');
    var proposal_id = href.split('=')[1];

    $.ajax({
      type: 'POST',
      url: 'save.php',
      data: {
        check: true
      },
      success: function (data) {
        window.location.replace("org_view.php?id=" + proposal_id)
      },
      error: function (error) {
        alert("There was an error moving to bp")
      }
    });
  });

  //:: Retrieves saved inputs from Activity Proposal page
    $('#proposal').ready(function () {
      $('.field_ap').each(function () {
        var id = $(this).attr('id');
        var value = sessionStorage.getItem(id);
  
        $(this).val(value);
      });
    });



  //:: Retrieves saved inputs from Budget Proposal page
  $('#bp').ready(function () {

    var far_id1 = Math.floor(Math.random() * 9999) + 999;
    var oe_id1 = Math.floor(Math.random() * 9999) + 999;

    $('.field_far').each(function () {
      var id = $(this).attr('id');
      var value = sessionStorage.getItem(id);

      $(this).val(value);
    });
    $('.field_oe').each(function () {
      var id = $(this).attr('id');
      var value = sessionStorage.getItem(id);

      $(this).val(value);
    });
    $("#far_txt_id1").val(far_id1);
    $("#oe_txt_id1").val(oe_id1);
  });



  //:: Checks if there are empty inputs from the forms
  function checking() {

    //:: Default values for the three forms are set to true

    //:: This is used to check if there are incomplete inputs
    //:: true means there are no incomplete inputs while false
    //:: means there are incomplete values
    var fields = [
      true, //:: Activity Proposal
      true, //:: Fixed Assets Requirements
      true //:: Operating Expenses
    ];
    var inputs = [
      $('.field_ap'),
      $('.field_far'),
      $('.field_oe')
    ];

    //:: Checks each form if there are incomplete inputs starting
    //:: from Activity Proposal form to Operating Expenses form
    for (var form = 0; form < 3; form++) {
      for (var field = 0; field < inputs[form].length; field++) {
        if (!$(inputs[form][field]).val()) {
          fields[form] = false;
        } else {
          continue;
        }
      }
    }

    if (fields[0] == true && (fields[1] == true || fields[2] == true)) {
      return true;
    } else {
      return false;
    }

  }

  //:: Similar to checking() but returns multiple values
  //:: Sets boolean values in each form (AP, FAR, and OE)
  function checkInputs() {

    //:: Default values for the three forms are set to true

    //:: This is used to check if there are incomplete inputs
    //:: true means there are no incomplete inputs while false
    //:: means there are incomplete values
    var fields = [
      true, //:: Activity Proposal
      true, //:: Fixed Assets Requirements
      true //:: Operating Expenses
    ];
    var inputs = [
      $('.field_ap'),
      $('.field_far'),
      $('.field_oe')
    ];

    //:: Checks each form if there are incomplete inputs starting
    //:: from Activity Proposal form to Operating Expenses form
    for (var form = 0; form < 3; form++) {
      for (var field = 0; field < inputs[form].length; field++) {
        if (!$(inputs[form][field]).val()) {
          fields[form] = false;
        } else {
          continue;
        }
      }
    }

    if (fields[0] == true && (fields[1] == true || fields[2] == true)) {
      if (fields[1] == true && fields[2] == true) {

        return {
          ap: true,
          far: true,
          oe: true
        };

      } else if (fields[1] == true && fields[2] == false) {

        return {
          ap: true,
          far: true,
          oe: false
        };

      } else if (fields[1] == false && fields[2] == true) {

        return {
          ap: true,
          far: false,
          oe: true
        };

      }

    } else {
      return {
        ap: false,
        far: false,
        oe: false
      };
    }
  }

  function getBPData(far, oe) {

    var far_item1_2 = $('#far_txt_item1').val();
    var far_quantity1_2 = $('#far_txt_quantity1').val();
    var far_unit_price1_2 = $('#far_txt_unit1').val();
    var far_total_amount1_2 = $('#far_txt_total1').val();
    var far_source_of_fund1_2 = $('#far_source_of_fund1').val();
    var far_id2 = $('#far_txt_id1').val();

    var oe_item1_2 = $('#oe_txt_item1').val();
    var oe_quantity1_2 = $('#oe_txt_quantity1').val();
    var oe_unit_price1_2 = $('#oe_txt_unit1').val();
    var oe_total_amount1_2 = $('#oe_txt_total1').val();
    var oe_source_of_fund1_2 = $('#oe_source_of_fund1').val();
    var oe_id2 = $('#oe_txt_id1').val();

    var proposal2 = 'BP';
    var bp_far = false;
    var bp_oe = false;

    if (far && !oe) {
      var bp_far = true;

      return {
        far_id: far_id2,
        far_item: far_item1_2,
        far_quantity: far_quantity1_2,
        far_unit_price: far_unit_price1_2,
        far_total_amount: far_total_amount1_2,
        far_source_of_fund: far_source_of_fund1_2,
        proposal: proposal2,
        bp_far: bp_far,
        bp_oe: bp_oe
      };

    } else if (!far && oe) {
      var bp_oe = true;

      return {
        oe_id: oe_id2,
        oe_item: oe_item1_2,
        oe_quantity: oe_quantity1_2,
        oe_unit_price: oe_unit_price1_2,
        oe_total_amount: oe_total_amount1_2,
        oe_source_of_fund: oe_source_of_fund1_2,
        proposal: proposal2,
        bp_oe: bp_oe,
        bp_far: bp_far
      };

    } else if (far && oe) {
      var bp_far = true;
      var bp_oe = true;

      return {
        far_id: far_id2,
        far_item: far_item1_2,
        far_quantity: far_quantity1_2,
        far_unit_price: far_unit_price1_2,
        far_total_amount: far_total_amount1_2,
        far_source_of_fund: far_source_of_fund1_2,
        oe_id: oe_id2,
        oe_item: oe_item1_2,
        oe_quantity: oe_quantity1_2,
        oe_unit_price: oe_unit_price1_2,
        oe_total_amount: oe_total_amount1_2,
        oe_source_of_fund: oe_source_of_fund1_2,
        bp_oe: bp_oe,
        bp_far: bp_far,
        proposal: proposal2
      };

    } else {
      alert("There was an error");
      return;
    }
  }


});

//:: Vanilla Javascript

//:: For FAR
function addField() {
  var txtbox = [
    text_counter_far,
    "<input type='text' class='field_far' name='far_item" + text_counter_far + "' id='far_txt_item" + text_counter_far + "' required>",
    "<input type='number' class='field_far' name='far_quantity" + text_counter_far + "' id='far_txt_quantity" + text_counter_far + "' min=0 value=0 oninput='calculate(this.id)' required>",
    "<input type='number' class='field_far' name='far_unit_price" + text_counter_far + "' id='far_txt_unit" + text_counter_far + "' step='any' min=0 value=0 oninput='calculate(this.id)' required>",
    "<input type='number' class='field_far' name='far_total_amount" + text_counter_far + "' id='far_txt_total" + text_counter_far + "' value=0.00 readonly required>",
    "<select name='far_source_of_fund" + text_counter_far + "' class='field_far'><option>Human Biology</option>"
  ];

  var cell = new Array(6);
  var table = document.getElementById("fields_far");
  var row = table.insertRow(2 + field_counter_far);
  field_counter_far++;

  for (counter = 0; counter < cell.length; counter++) {
    cell[counter] = row.insertCell(counter);
  }

  for (counter = 0; counter < txtbox.length; counter++) {
    cell[counter].innerHTML = txtbox[counter];
  }
  text_counter_far++;
}

//:: For FAR
function deleteField() {

  if (text_counter_far == 2) {
    return 0;
  } else {
    var table = document.getElementById("fields_far");

    table.deleteRow(field_counter_far + 1);

    field_counter_far--;
    text_counter_far--;
  }
}

//:: For Operating Expenses
function deleteField2() {

  if (text_counter_oe == 2) {
    return 0;
  } else {
    var table = document.getElementById("fields_oe");

    table.deleteRow(field_counter_oe + 1);

    field_counter_oe--;
    text_counter_oe--;
  }
}

//:: For Operating Expenses
function addField2() {
  var txtbox = [
    text_counter_oe,
    "<input type='text' class='field_oe' name='oe_item" + text_counter_oe + "' id='oe_txt_item" + text_counter_oe + "' required>",
    "<input type='number' class='field_oe' name='oe_quantity" + text_counter_oe + "' id='oe_txt_quantity" + text_counter_oe + "' min=0 value=0 oninput='calculate(this.id)' required>",
    "<input type='number' class='field_oe' name='oe_unit_price" + text_counter_oe + "' id='oe_txt_unit" + text_counter_oe + "' step='any' min=0 value=0 oninput='calculate(this.id)' required>",
    "<input type='number' class='field_oe' name='oe_total_amount" + text_counter_oe + "' id='oe_txt_total" + text_counter_oe + "' value=0.00 readonly required>",
    "<select name='oe_source_of_fund" + text_counter_oe + "' class='field_oe'><option>Human Biology</option>"
  ];

  var cell = new Array(6);
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
}

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





