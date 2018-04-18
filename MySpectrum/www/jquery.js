$("#signup").click(function() {
  var firstname = $("#firstname").val();
  var surname = $("#surname").val();
  var email = $("#email").val();
  var password = $("#password").val();
  var dataString = "firstname="+firstname+"&surname="+surname+"&email="+email+"&password="+password+"&signup=";
  if ($.trim(firstname).length>0 & $.trim(surname).length>0 & $.trim(email).length>0 & $.trim(password).length>0) {
    $.ajax({
      type: "POST",
      url: url,
      data: dataString,
      crossDomain: true,
      cache: false,
      beforeSend: function(){ $("#signup").val('Connecting...');},
      success: function(data) {
        if (data == "success") {
          alert("Thank you for Signing up with us! you can login now");
        } else if (data = "exist") {
          alert("You alreay has account!");
        } else if (data = "failed") {
          alert("Something went wrong...");
        }
      }
    });
  }
  return false;
});



$("#login").click(function() {
  var email = $("#email").val();
  var password = $("#password").val();
  var dataString = "email="+email+"&password="+password+"&login=";
  if ($.trim(email).length>0 & $.trim(password).length>0) {
    $.ajax( {
      type: "POST",
      url: url,
      data: dataString,
      crossDomain: true,
      cache: false,
      beforeSend: function(){ $("#login").html('Connecting...');},
      success: function(data) {
        if (data == "success") {
          localStorage.login = "true";
          localStorage.email = email;
          window.location.href = "index.html";
        } else if (data = "failed") {
          alert("Login error");
          $("#login").html('Login');
        }
      }
    });
  }
  return false;
});
