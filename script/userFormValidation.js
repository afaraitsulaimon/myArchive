var usersReg_Form = document.forms.userRegistrationForm;

var nameErrorReg = document.getElementById('errorUserRegFullName');
var userNameErrReg = document.getElementById('errorRegUserName');
var emailErrorReg = document.getElementById('errorUserRegEmail');
var passCodeErrorReg = document.getElementById('errorUserRegPassWord');
var conFPassErrorReg = document.getElementById('errorUserRegConPassWord');
var deptErrorUser = document.getElementById('errorUserRegDept');



// validation for the full name
// check if their is no input
//also check if the details entered is number
// or if the length of the details entered is less than 4

function validateUserFullName(){

	if (usersReg_Form.usersFullName.value === "" || usersReg_Form.usersFullName.value === null ) {

      usersReg_Form.usersFullName.style.borderColor = 'red';
      nameErrorReg.innerHTML = 'Enter your name';

	}else if (usersReg_Form.usersFullName.value !== "" && usersReg_Form.usersFullName.value !== null && usersReg_Form.usersFullName.value.length <= 4) {

    usersReg_Form.usersFullName.style.borderColor = 'red';
      nameErrorReg.innerHTML = 'Name must be more than 4 letters';

	}else{
           
           nameErrorReg.innerHTML = '';
           usersReg_Form.usersFullName.style.borderColor = 'green';
         
	}

}
usersReg_Form.usersFullName.addEventListener("blur",validateUserFullName, false);

//validation for username
//check if the user did not enter anything in the input field
//check if the length of the string entered is less that 4 or equal to 4
// if the username chosen is more than , then it is acceptable

function userNameRegValidation(){

   if (usersReg_Form.usernameReg.value === "" || usersReg_Form.usernameReg.value === null) {

     usersReg_Form.usernameReg.style.borderColor = "red";
     userNameErrReg.innerHTML = "Enter a username";

   }else if (usersReg_Form.usernameReg.value == "" && usersReg_Form.usernameReg.value == null && usersReg_Form.usernameReg.value.length <= 4) {

   	usersReg_Form.usernameReg.style.borderColor = "red";
   	userNameErrReg.innerHTML = "Username must be more than 4 letters";

   }else{
     
     userNameErrReg.innerHTML = "";
     usersReg_Form.usernameReg.style.borderColor = "green";

   }

}
usersReg_Form.usernameReg.addEventListener("blur", userNameRegValidation, false);




//validation for email address
//check if the user did not enter anything
// also check if the way the user entered the email address is not proper

function validateUserEmail(){

	if (usersReg_Form.userRegEmail.value === "" || usersReg_Form.userRegEmail.value === null || usersReg_Form.userRegEmail.value.indexOf('@') > usersReg_Form.userRegEmail.value.lastIndexOf('.')) {

     usersReg_Form.userRegEmail.style.borderColor = 'red';

      emailErrorReg.innerHTML = 'Please enter an email address';
	}else{

   emailErrorReg.innerHTML = '';
  usersReg_Form.userRegEmail.style.borderColor = 'green';


	}
}

usersReg_Form.userRegEmail.addEventListener("blur", validateUserEmail, false);


// validation for department
//check if none is not selected


function userRegValidateDept(){

	if (usersReg_Form.usersDept.value == 'null') {

         usersReg_Form.usersDept.style.borderColor = 'red';
         deptErrorUser.innerHTML = "Select Department";

	}else if (usersReg_Form.usersDept.value == 'Bills' || usersReg_Form.usersDept.value == 'LC' || usersReg_Form.usersDept.value == 'Non-Valid' || usersReg_Form.usersDept.value == 'Export' || usersReg_Form.usersDept.value == 'Invisible' || usersReg_Form.usersDept.value == 'ADA-Scan') {

       usersReg_Form.usersDept.style.borderColor = 'green';
         deptErrorUser.innerHTML = "";
	}
}

usersReg_Form.usersDept.addEventListener("blur", userRegValidateDept, false);

//validation for password 
//check if the field is empty
//check if the length of the input value is less than 6

function usersPassRegValidation(){

   if (usersReg_Form.userRegPassCode.value === "" || usersReg_Form.userRegPassCode.value === null) {

   	usersReg_Form.userRegPassCode.style.borderColor = "red";
   	passCodeErrorReg.innerHTML = "Enter a password";

   }else if (usersReg_Form.userRegPassCode.value !== "" && usersReg_Form.userRegPassCode.value !== null && usersReg_Form.userRegPassCode.length <= 6) {


   	usersReg_Form.userRegPassCode.style.borderColor = "red";
   	passCodeErrorReg.innerHTML = "Password must be more than 6";

   }else{

  usersReg_Form.userRegPassCode.style.borderColor = "green";
  passCodeErrorReg.innerHTML = "";

   }


}

usersReg_Form.userRegPassCode.addEventListener("blur", usersPassRegValidation, false);




//validation for confirm password input
//check if the input field is empty
//check if the length of the input value is less than 6
//check if the confirm password is the same has password



function validateUserConPass(){

   if (usersReg_Form.userRegConfPassCode.value === "" || usersReg_Form.userRegConfPassCode.value === null) {

   	   usersReg_Form.userRegConfPassCode.style.borderColor = "red";
   	   conFPassErrorReg.innerHTML = "Enter password";
   }else if (usersReg_Form.userRegConfPassCode.value !== "" && usersReg_Form.userRegConfPassCode.value !== null && usersReg_Form.userRegConfPassCode.value.length <= 6) {

   	usersReg_Form.userRegConfPassCode.style.borderColor = "red";
   	conFPassErrorReg.innerHTML = "Password should be more than 6";

   }else if (usersReg_Form.userRegConfPassCode.value !== usersReg_Form.userRegPassCode.value) {

   	usersReg_Form.userRegConfPassCode.style.borderColor = "red";
   	conFPassErrorReg.innerHTML = "Password does not match";

   }else{

   	usersReg_Form.userRegConfPassCode.style.borderColor = "green";
   	conFPassErrorReg.innerHTML = "";

   }


}

usersReg_Form.userRegConfPassCode.addEventListener("blur", validateUserConPass, false);



//STARTTING VALIDATION FOR THE USER LOGIN
var logInUserForm = document.forms.userLoginForm;

var theLoginUserNameErr = document.getElementById('loginUserName_Errors');
 var theUserLoginPassErr =document.getElementById('loginUserPass_Errors');



//validation for username log in
//check if the input is empty or not details entered

function validateUsersLogin(){

	if (logInUserForm.inputuserName.value === "" || logInUserForm.inputuserName === null) {

		logInUserForm.inputuserName.style.borderColor = "red";
		theLoginUserNameErr.innerHTML = "Enter Your Username";
	}else{

		logInUserForm.inputuserName.style.borderColor = "green";
		theLoginUserNameErr.innerHTML = "";
	}
}

logInUserForm.inputuserName.addEventListener("blur", validateUsersLogin, false);


//validattion for password login form
//check if the imput field is empty

function validatePassLogin(){


	if (logInUserForm.users_Password.value === "" || logInUserForm.users_Password.value === null) {

		logInUserForm.users_Password.style.borderColor = "red";
		theUserLoginPassErr.innerHTML = "Password is required";
	}else{

		logInUserForm.users_Password.style.borderColor = "green";
		theUserLoginPassErr.innerHTML = "";

	}
}

logInUserForm.users_Password.addEventListener("blur", validatePassLogin, false);