function validate_HOD() {
  var date = document.getElementById("starting_day").value;

  var str = /^(0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])[\/\-]\d{4}$/;

  if (str.test(date)) {
    document
      .getElementById("form")
      .setAttribute("action", "submit_casual_leave_HOD.php");
  } else if (!date == "") {
    document.getElementById("form").setAttribute("action", "");
    alert(
      "Please fillup starting date in format. [Format: dd/mm/yyyy, Example1: 23/01/1991], Example2: 09/01/1991]"
    );
    window.location.href = "casual_leave_HOD.php";
  }
}



function validate_admin() {
  var date = document.getElementById("starting_day").value;

  var str = /^(0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])[\/\-]\d{4}$/;

  if (str.test(date)) {
    document
      .getElementById("form")
      .setAttribute("action", "submit_casual_leave_HOD.php");
  } else if (!date == "") {
    document.getElementById("form").setAttribute("action", "");
    alert(
      "Please fillup the date of birth in format. [Format: dd/mm/yyyy, Example1: 23/01/1991], Example2: 09/01/1991]"
    );
    window.location.href = "admin_add_HOD.php";
  }
}

function validate_staff() {
  var date = document.getElementById("starting_day").value;

  var str = /^(0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])[\/\-]\d{4}$/;

  if (str.test(date)) {
    document
      .getElementById("form")
      .setAttribute("action", "submit_casual_leave_staff.php");
  } else if (!date == "") {
    document.getElementById("form").setAttribute("action", "");
    alert(
      "Please fillup starting date in format. [Format: dd/mm/yyyy, Example1: 23/01/1991], Example2: 09/01/1991]"
    );
    window.location.href = "casual_leave_staff.php";
  }
}

