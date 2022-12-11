$(document).ready(function () {
  $("#guardians_phoneno").keyup(function () {
    //Read the fields
    let number = $(this).val();
    $.ajax({
      type: "POST",
      url: "process/ajax.php",
      data: {
        phoneno: number,
        action: "getGuardian",
      },
      success: function (result) {
        // console.log(result);
        let data = JSON.parse(result);
        $("#g_name").val(data.g_surname);
        $("#surname").val(data.surname);
        $("#middle_name").val(data.middlename);
        $("#last_name").val(data.lastname);
      },
      error: function (request, error) {
        console.log("ERROR:" + error);
      },
    });
    return false;
  });

  // fetch all terms
  $.ajax({
    type: "POST",
    url: "process/ajax.php",
    data: {
      action: "getTerms",
    },
    success: function (result) {
      $("#term").html(result);
    },
    error: function (request, error) {
      console.log("ERROR:" + error);
    },
  });
  // fetch all levels
  $.ajax({
    type: "POST",
    url: "process/ajax.php",
    data: {
      action: "getLevel",
    },
    success: function (result) {
      $("#level").html(result);
    },
    error: function (request, error) {
      console.log("ERROR:" + error);
    },
  });

  // populate amount based on the selected level
  $("#level").change(function () {
    //Read the fields
    let value = $(this).val();
    $.ajax({
      type: "POST",
      url: "process/ajax.php",
      data: {
        id: value,
        action: "getAmount",
      },
      success: function (result) {
        $("#amount").html(result);
      },
      error: function (request, error) {
        console.log("ERROR:" + error);
      },
    });
    return false;
  });
  // compute total_fees
  $("#level").change(function () {
    //Read the fields
    let value = $(this).val();
    $.ajax({
      type: "POST",
      url: "process/ajax.php",
      data: {
        id: value,
        action: "computeFees",
      },
      success: function (result) {
        $("#total_fees").val(result);
      },
      error: function (request, error) {
        console.log("ERROR:" + error);
      },
    });
    return false;
  });
  // compute total_fees
  $("#amount").change(function () {
    //Read the fields
    let amount = $(this).val();
    $("#amount_paid").val(amount);
    $("#amount_unpaid").val($("#total_fees").val() - amount);
  });
});
