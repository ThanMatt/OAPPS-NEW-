var account_id;
var flag;

//:: Variable `flag` is an indicator that tells
//:: which type of proposal 

$(function () {
  setInterval(
    function () {
      $('#admin-log').load(BASE_URL + 'Admin/displayLogs').fadeIn("slow");
    }, 5500); // refreshing after every 15000 milliseconds




  $(".img").on("click", function () {
    $(".dropdown-content").toggle("dropdowntest");
  });

  //:: Check login credentials
  $("#ajax_form").submit(function (event) {
    event.preventDefault();
    var $form = $(this);

    $.ajax({
      type: 'POST',
      url: BASE_URL + "accounts_admin/login",
      data: $form.serialize(),
      dataType: 'json',
      success: function (response) {
        if (response.success) {
          window.location.replace(BASE_URL + "admin");
        } else {
          $("#button").effect("shake");
        }
      },
      error: function (error) {
        $("#button").effect("shake");
      }
    });
  });

  //:: View clicked proposals
  $('body').on('click', '.proposal-view', function () {
    var view_buttonID = $(this).attr('id');
    var account_id = view_buttonID.split("/")[1];

    flag = 'View';

    $.ajax({
      type: 'POST',
      url: BASE_URL + 'admin/showAccount',
      data: {
        account_id: account_id,
      },
      success: function (response) {

        $('#account-container').html(response);
      },
      error: function (response) {
        alert("There was an error! " + response);
        location.reload();
      },
    });
  })

});