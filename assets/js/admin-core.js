var account_id;
var flag;

//:: Variable `flag` is an indicator that tells
//:: which type of proposal 

$(function () {
  setInterval(
    function () {
      $('#admin-log').load(BASE_URL + 'Admin/displayLogs').fadeIn("slow");
    }, 5500); // refreshing after every 15000 milliseconds

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
  $(document).on('click', '.proposal-view', function () {
    var view_buttonID = $(this).attr('id');
    var account_id = view_buttonID.split("/")[1];

    flag = 'View';

    $.ajax({
      type: 'POST',
      url: BASE_URL + 'admin/showAccount',
      data: {
        account_id: account_id,
      },
      cache: false,
      success: function (response) {
        $('#account-container').html(response);
      },
      error: function (response) {
        alert("There was an error! " + response);
        location.reload();
      },
    });
  });

  $('#admin-new').submit(function (e) {
    e.preventDefault();
    $('#submit-new-btn').prop('disabled', true);
    $.ajax({
      type: 'POST',
      url: BASE_URL + 'admin/register',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      dataType: 'json',
      success: function (response) {
        if (response.success) {
          alert('Registration successful');
          $('#submit-new-btn').prop('disabled', false);
          window.location.replace(BASE_URL + "admin/edit");

        } else {
          alert(response.remark);
        }
      },
      error: function (response) {
        alert("There was an error");
        location.reload();
      }
    });
  });

});