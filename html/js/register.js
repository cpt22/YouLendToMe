//client-side registration validation
$(document).ready(function() {
  $("#inputFirstName_error").hide();
  $("#inputLastName_error").hide();
  $("#inputEmail_error").hide();
  $("#inputUsername_error").hide();
  $("#inputPassword_error").hide();
  $("#inputConfirmPassword_error").hide();
  $("#inputPhone_error").hide();
  $("#inputAddress1_error").hide();
  $("#inputAddress2_error").hide();
  $("#inputCity_error").hide();
  $("#inputState_error").hide();
  $("#inputZip_error").hide();

  var error_fname = false;
  var error_lname = false;
  var error_email = false;
  var error_username = false;
  var error_password = false;
  var error_cpassword  = false;
  var error_phone = false;
  var error_addr1 = false;
  var error_addr2 = false;
  var error_state = false;
  var error_zip = false;

  $("#inputFirstName").focusout(function(){
    check_fname();
  });

  $("#inputLastName").focusout(function(){
    check_lname();
  });

  $("#inputEmail").focusout(function(){
    check_email();
  });

  $("#inputUsername").focusout(function(){
    check_username();
  });

  $("#inputPassword").focusout(function(){
    check_password();
  });

  $("#inputConfirmPassword").focusout(function(){
    check_cpassword();
  });

  $("#inputPhone").focusout(function(){
    check_phone();
  });

  $("#inputAddress1").focusout(function(){
    check_addr1();
  });

  $("#inputAddress2").focusout(function(){
    check_addr2();
  });

  $("#inputCity").focusout(function(){
    check_city();
  });

  $("#inputCity").focusout(function(){
    check_city();
  });

  $("#inputState").focusout(function(){
    check_state();
  });

  $("#inputZip").focusout(function(){
    check_zip();
  });



// firstname validation function
  function check_fname(){
    var pattern = /^[a-zA-Z.\-' ]*$/;
    var fname = $("#inputFirstName").val();
    if(pattern.test(fname) && fname !== ''){
      $("#inputFirstName_error").hide();
      $("#inputFirstName").removeClass("is-invalid");
    }
    else{
      $("#inputFirstName_error").html("Only Characters Allowed");
      $("#inputFirstName_error").show();
      $("#inputFirstName").addClass("is-invalid");
    }
  }
// lastname validation function
  function check_lname(){
      var pattern = /^[a-zA-Z.\-' ]*$/;
      var fname = $("#inputLastName").val();
      if(pattern.test(fname) && fname !== ''){
        $("#inputLastName_error").hide();
        $("#inputLastName").removeClass("is-invalid");
      }
      else{
        $("#inputLastName_error").html("Only Characters Allowed");
        $("#inputLastName_error").show();
        $("#inputLastName").addClass("is-invalid");
      }
    }
// email address validation
  function check_email(){
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var email = $("#inputEmail").val();
    var valid =  regex.test(email);
    if(valid === true){
      $("#inputEmail_error").hide();
      $("#inputEmail").removeClass("is-invalid");
      
      $.post("../verification/checkEmailTaken.php",
    		  {
    		    email: email
    		  },
    		  function(data, status){
    			  console.log(data);
    		    if (data == "available") {
    		    	$("#inputEmail").addClass("is-valid");
    		    } else {
    		    	$("#inputEmail").addClass("is-invalid");
    		    	$("#inputEmail_error").html("Email associated with another account");
    		    	$("#inputEmail_error").show();
    		    }
    		  });
    }
    else{
      $("#inputEmail_error").html("Email Address Invalid");
      $("#inputEmail_error").show();
      $("#inputEmail").addClass("is-invalid");
    }
  }
// username validation
  function check_username(){
    var username = $("#inputUsername").val();
    var pattern = /^[a-zA-Z0-9]*$/;
    if(pattern.test(username) && username !== ''){
      $("#inputUsername_error").hide();
      $("#inputUsername").removeClass("is-invalid");
      
      $.post("../verification/checkUNameTaken.php",
    		  {
    		    username: username
    		  },
    		  function(data, status){
    			  console.log(data);
    		    if (data == "available") {
    		    	$("#inputUsername").addClass("is-valid");
    		    } else {
    		    	$("#inputUsername").addClass("is-invalid");
    		    	$("#inputUsername_error").html("Username Taken");
    		    	$("#inputUsername_error").show();
    		    }
    		  });
    }
    else{
      $("#inputUsername_error").html("Only Characters and Numbers Allowed");
      $("#inputUsername_error").show();
      $("#inputUsername").addClass("is-invalid");
    }
  }
// password validation
  function check_password(){
    var pattern = /^(?=.*\d).{4,15}$/ ;
    var password  = $("#inputPassword").val();
    if(pattern.test(password) && password !== ''){
      $("#inputPassword_error").hide();
      $("#inputPassword").removeClass("is-invalid");
    }
    else{
      $("#inputPassword_error").html("Password needs 4-15 characters with atleast 1 number");
      $("#inputPassword_error").show();
      $("#inputPassword").addClass("is-invalid");
    }
  }
// cpassword validation
  function check_cpassword(){
    var pass1 = $("#inputPassword").val();
    var pass2 = $("#inputConfirmPassword").val();
    if(pass1 === pass2){
      $("#inputConfirmPassword_error").hide();
      $("#inputConfirmPassword").removeClass("is-invalid");
    }
    else{
      $("#inputConfirmPassword_error").html("Passwords do not match");
      $("#inputConfirmPassword_error").show();
      $("#inputConfirmPassword").addClass("is-invalid");
    }
  }
// phone number validation
  function check_phone(){
    var phone = $("#inputPhone").val();
    var pattern = /^(1?(-?\d{3})-?)?(\d{3})(-?\d{4})$/;
    if(pattern.test(phone) && phone !== ''){
      $("#inputPhone_error").hide();
      $("#inputPhone").removeClass("is-invalid");
    }
    else{
      $("#inputPhone_error").html("Invalid Phone Number");
      $("#inputPhone_error").show();
      $("#inputPhone").addClass("is-invalid");
    }

  }
// check address field 1
  function check_addr1(){
    var addr = $("#inputAddress1").val();
    var pattern = /^[a-zA-Z0-9.# ]*$/;
    if(pattern.test(addr) && addr !== ''){
      $("#inputAddress1_error").hide();
      $("#inputAddress1").removeClass("is-invalid");
    }
    else{
      $("#inputAddress1_error").html("Invalid Address Entry");
      $("#inputAddress1_error").show();
      $("#inputAddress1").addClass("is-invalid");
    }
  }
// check address field 2
  function check_addr2(){
      var addr = $("#inputAddress2").val();
      var pattern = /^[a-zA-Z0-9.# ]*$/;
      if(pattern.test(addr) && addr !== ''){
        $("#inputAddress2_error").hide();
        $("#inputAddress2").removeClass("is-invalid");
      }
      else{
        $("#inputAddress2_error").html("Invalid Address Entry");
        $("#inputAddress2_error").show();
        $("#inputAddress2").addClass("is-invalid");
      }
    }
// check city
  function check_city(){
    var city = $("#inputCity").val();
    var pattern = /^[a-zA-Z.\-' ]*$/;
    if(pattern.test(city) && city !== ''){
      $("#inputCity_error").hide();
      $("#inputCity").removeClass("is-invalid");
    }
    else{
      $("#inputCity_error").html("Only characters allowed");
      $("#inputCity_error").show();
      $("#inputCity").addClass("is-invalid");
    }
  }
// check if a state has been selected
  function check_state(){
    var state = $("#inputState").val();
    if(state !== "State"){
      $("#inputState_error").hide();
    }
    else{
      $("#inputState_error").html("Select State");
      $("#inputState_error").show();
    }
  }
// check if zipcode is valid
  function check_zip(){
    var zip = $("#inputZip").val();
    var pattern = /^[0-9]{5}(?:-[0-9]{4})?$/;
    if(pattern.test(zip) && zip !== ''){
      $("#inputZip_error").hide();
      $("#inputZip").removeClass("is-invalid");
    }
    else{
      $("#inputZip_error").html("Invalid Zipcode");
      $("#inputZip_error").show();
      $("#inputZip").addClass("is-invalid");
    }
  }
});
