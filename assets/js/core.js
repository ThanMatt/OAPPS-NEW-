var account_id;
var flag;

$(function () {

  function queryTable(response) {
    account_id = response['account_id'];

    $.ajax({
      type: 'POST',
      url: BASE_URL + 'home/index',
      data: {
        flag: flag
      },
      success: function (response) {
        // alert(response);
        // $('#proposal-container').load(' #proposal-container');
        $('body').html(response);
        // window.location.replace("index");
      },
      error: function (response) {
        return;
      },
    });
  }

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
          // alert("pasok");
          window.location.replace("index");
        } else {
          // alert("Hindi ka pasok");
          $("#button").effect("shake");
        }
      },
      error: function (error) {
        $("#button").effect("shake");
      }
    });
  });

  $("#table-container").ready(function (event) {

    $('#btn_approved').click(function () {

      flag = 'APPROVED';
      $.ajax({
        type: 'POST',
        url: BASE_URL + "/accounts/getJSON",
        dataType: 'json',
        success: queryTable,

      });
    });

    $('#btn_pending').click(function () {
      flag = 'PENDING';
      $.ajax({
        type: 'POST',
        url: BASE_URL + "/accounts/getJSON",
        dataType: 'json',
        success: queryTable,

      });
    });

    $('#btn_drafts').click(function () {
      flag = 'DRAFTS';
      $.ajax({
        type: 'POST',
        url: BASE_URL + "/accounts/getJSON",
        dataType: 'json',
        success: queryTable,

      });
    });

    $('#btn_revisions').click(function () {
      flag = 'REVISIONS';
      $.ajax({
        type: 'POST',
        url: BASE_URL + "/accounts/getJSON",
        dataType: 'json',
        success: queryTable,

      });
    });
  });

});