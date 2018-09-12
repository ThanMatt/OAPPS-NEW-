var account_id;
var flag;

$(function () {

  $(".img").on("click", function () {
    $(".dropdown-content").toggle("dropdowntest");
  });

  $(document).on("click", function (){
    $(".dropdown-content").hide("dropdowntest");
  });


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

      flag = 'Approved';
      $.ajax({
        type: 'POST',
        url: BASE_URL + "/accounts/getJSON",
        dataType: 'json',
        success: queryTable,

      });
    });

    $('#btn_pending').click(function () {
      flag = 'Pending';
      $.ajax({
        type: 'POST',
        url: BASE_URL + "/accounts/getJSON",
        dataType: 'json',
        success: queryTable,

      });
    });

    $('#btn_drafts').click(function () {
      flag = 'Drafts';
      $.ajax({
        type: 'POST',
        url: BASE_URL + "/accounts/getJSON",
        dataType: 'json',
        success: queryTable,

      });
    });

    $('#btn_revisions').click(function () {
      flag = 'Revisions';
      $.ajax({
        type: 'POST',
        url: BASE_URL + "/accounts/getJSON",
        dataType: 'json',
        success: queryTable,

      });
    });
  });

});