//check user id
function validateEmail() {
  var email = document.getElementById("email").value;
  var re = /^\S+@\S+\.\S+$/;

  //check empty email field
  if (email== null || email == "") {
    alert("Email cannot be blank!");
    return false;
  }

  //check user email only
  else if(!re.test(email)) {
    alert("Invalid email address!");
    return false;
}
  
  //if correct
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
    alert("Incorrect password!");
    return false;
  }

  //maximum password length validation 
  else if (password.length > 4) {
    alert("Incorrect password!");
    return false;
  }
  
  //check user password number only
  else if(!re.test(password)) {
    alert("Incorrect password!");
    return false;
  }
  
  //if correct
  else {
    return true;
  }
}