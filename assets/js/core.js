var account_id;
var flag;

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
          window.location.replace(BASE_URL + "home/index");
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

  //::Fix this
  $('body').on('click', '.nav-button-left', function () {
    var proposal_title = $(this).val();
    flag = 'View';

   $.ajax({
      type: 'POST',
      url: BASE_URL + 'home/index',
      data: {
        proposal_title: proposal_title,
        flag: flag
      },
      success: function (response) {
        // alert(response);
        $('#table-container').html(response);
      },
      error: function (response) {
        // $('#table-container').html(response);
      },
    });
    
  })

});