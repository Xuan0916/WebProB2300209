function validateEmail() {
  var email = document.getElementById("email").value;
  re = /\S+@\S+\.\S+/;

  // Check if the email field is empty
  if (email == null || email == "") {
    alert("Email cannot be blank!");
    return false;
  }

  // Check if the email format is valid
  else if (!re.test(email)) {
    alert("Invalid email format!");
    return false;
  }

  // If the email is valid
  else {
    return true;
  }
}


//check user password
function validatePassword() {
  var password = document.getElementById("password").value;
  re = /^[0-9]/;

  //check empty password field
  if (password == null || password == "") {
    alert("User password cannot be blank!");
    return false;
  }

  //minimum password length validation
  else if (password.length < 4) {
    alert("User password cannot lesser than 4!");
    return false;
  }

  //maximum length of password validation 
  else if (password.length > 4) {
    alert("User password cannot more than 4!");
    return false;
  }
  
  //check user id number only
  else if(!re.test(password)) {
    alert("User password must contain number only!");
    return false;
  }
  
  //if correct
  else {
    return true;
  }
}

//check user name
function validateName() {
  var userName = document.getElementById("username").value;

  //check empty password field
  if (userName == null || userName == "") {
    alert("Your name cannot be blank!");
    return false;
  }
  
  //if correct
  else {
    return true;
  }
}

//check user ic
function validatePhone() {
  var userphone = document.getElementById("userphone").value;
  re = /^[0-9]/;

  //check empty password field
  if (userphone == null || userphone == "") {
    alert("User phone cannot be blank!");
    return false;
  }

  //minimum password length validation
  else if (userphone.length < 12) {
    alert("User phone digit maximum is 11!");
    return false;
  }

  //maximum length of password validation 
  else if (userphone.length > 9) {
    alert("User phone digit minimum is 10!");
    return false;
  }
  
  //check user id number only
  else if(!re.test(userphone)) {
    alert("User phone must contain number only!");
    return false;
  }
  
  //if correct
  else {
    return true;
  }
}

//check user ic
function validateGender() {
  var gender = document.getElementsByClassName("jantina").value;

  //check empty password field
  if (gender == null || gender == "") {
    alert("Please choose your gender!");
    return false;
  }

  //if correct
  else {
    return true;
  }
}