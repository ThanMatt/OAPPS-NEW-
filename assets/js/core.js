var account_id;
var flag;

//:: Variable `flag` is an indicator that tells
//:: which type of proposal 

$(function () {


  $(".img").on("click", function () {
    $(".dropdown-content").toggle("dropdowntest");
  });

  // $(document).on("click", function (){
  //   $(".dropdown-content").hide("dropdowntest");
  // });

  function queryTable(response) {
    account_id = response['account_id'];

    $.ajax({
      type: 'POST',
      url: BASE_URL + 'home/index',
      data: {
        flag: flag
      },
      success: function (response) {
        $('body').html(response);
      },
      error: function (response) {
        return;
      },
    });
  }

  //:: Check login credentials
  $("#ajax_form").submit(function (event) {
    event.preventDefault();
    var $form = $(this);

    $.ajax({
      type: 'POST',
      url: BASE_URL + "accounts/login",
      data: $form.serialize(),
      dataType: 'json',
      success: function (response) {
        if (response.success) {
          window.location.replace(BASE_URL + "home");
        } else {
          $("#button").effect("shake");
        }
      },
      error: function (error) {
        $("#button").effect("shake");
      }
    });
  });

  //:: View Pending/Approved/Revisions/Drafts Proposals
  $("#table-container").ready(function (event) {

    //:: View Approved
    $('#btn_approved').click(function () {

      flag = 'Approved';
      $.ajax({
        type: 'POST',
        url: BASE_URL + "/accounts/getJSON",
        dataType: 'json',
        success: queryTable,

      });
    });

    //:: View Pending
    $('#btn_pending').click(function () {
      flag = 'Pending';
      $.ajax({
        type: 'POST',
        url: BASE_URL + "/accounts/getJSON",
        dataType: 'json',
        success: queryTable,

      });
    });

    //:: View Drafts
    $('#btn_drafts').click(function () {
      flag = 'Drafts';
      $.ajax({
        type: 'POST',
        url: BASE_URL + "/accounts/getJSON",
        dataType: 'json',
        success: queryTable,

      });
    });

    //:: View Revisions
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

  //:: View clicked proposals
  $('body').on('click', '.table-tae', function () {
    var view_buttonID = $(this).attr('id');
    var proposal_id = view_buttonID.split("/")[1];

    flag = 'View';

    $.ajax({
      type: 'POST',
      url: BASE_URL + 'home/index',
      data: {
        proposal_id: proposal_id,
        flag: flag
      },
      success: function (response) {
        $('#table-container').html(response);
      },
      error: function (response) {
        alert("There was an error! " + response);
        location.reload();
      },
    });

  })

});