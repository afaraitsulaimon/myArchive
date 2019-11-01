
//REGISTRATION FOR JAVASCRIPT VALIDATION STARTS FROM HERE

var regStoreForm = document.forms.storeOwnRegForm;

var errorStoreName = document.getElementById('errorStoreRegName');
var errorStoreUser = document.getElementById('errorStoreRegUser');
var errorStoreEmail = document.getElementById('errorRegStoreEmail');
var errorStorePass = document.getElementById('errorRegStorePass');
var errorStoreConPass = document.getElementById('errorRegStoreConPass');
var RegsubmitButton = document.getElementById('messageButton');

//check for the fullname
function enterStoreName(){

    if (regStoreForm.storeRegFullName.value === "" || regStoreForm.storeRegFullName.value === null) {

        regStoreForm.storeRegFullName.style.borderColor = "red";
        errorStoreName.innerHTML = "Please enter name";

    }else if (regStoreForm.storeRegFullName.value !== "" && regStoreForm.storeRegFullName.value !== null && regStoreForm.storeRegFullName.value.length <= 3) {

        regStoreForm.storeRegFullName.style.borderColor = "red";
        errorStoreName.innerHTML = "Name must be more than 4 characters";

    }else{
        errorStoreName.innerHTML = "";
        regStoreForm.storeRegFullName.style.borderColor = "green";

    }
}
 regStoreForm.storeRegFullName.addEventListener("blur", enterStoreName, false);





 // check for username
 function enterStoreUserName(){

    if (regStoreForm.storeRegUserName.value === "" || regStoreForm.storeRegUserName.value === null) {

        regStoreForm.storeRegUserName.style.borderColor = "red";
        errorStoreUser.innerHTML = "Please enter username";

    }else if (regStoreForm.storeRegUserName.value !== "" && regStoreForm.storeRegUserName.value !== null && regStoreForm.storeRegUserName.value.length <= 3) {

        regStoreForm.storeRegUserName.style.borderColor = "red";
        errorStoreUser.innerHTML = "Username must be more than 4 characters";

    }else{
        errorStoreUser.innerHTML = "";
        regStoreForm.storeRegUserName.style.borderColor = "green";

    }
}
 regStoreForm.storeRegUserName.addEventListener("blur", enterStoreUserName, false);



//validate for email address entered

function enterStoreEmail(){

    if (regStoreForm.storeRegUserEmail.value ==="" || regStoreForm.storeRegUserEmail.value === null || regStoreForm.storeRegUserEmail.value.indexOf('@') > regStoreForm.storeRegUserEmail.value.lastIndexOf('.')) {

        regStoreForm.storeRegUserEmail.style.borderColor = "red";
        errorStoreEmail.innerHTML = "Please enter an Email Address";


    }else{

        regStoreForm.storeRegUserEmail.style.borderColor = "green";
        errorStoreEmail.innerHTML = "";

    }
 }

 regStoreForm.storeRegUserEmail.addEventListener("blur", enterStoreEmail, false);




//check for the password
function enterStorePassWord(){

    if (regStoreForm.storeRegUserPw.value === "" || regStoreForm.storeRegUserPw.value === null) {

        regStoreForm.storeRegUserPw.style.borderColor = "red";
        errorStorePass.innerHTML = "Please choose password";

    }else if (regStoreForm.storeRegUserPw.value !== "" && regStoreForm.storeRegUserPw.value !== null && regStoreForm.storeRegUserPw.value.length <= 6) {

        regStoreForm.storeRegUserPw.style.borderColor = "red";
        errorStorePass.innerHTML = "Password must be more than 4 characters";

    }else{
        errorStorePass.innerHTML = "";
        regStoreForm.storeRegUserPw.style.borderColor = "green";

    }
}
 regStoreForm.storeRegUserPw.addEventListener("blur", enterStorePassWord, false);


//check for confirm password
function enterStoreConPassWord(){

    if (regStoreForm.storeRegUserConfirmPw.value === "" || regStoreForm.storeRegUserConfirmPw.value === null) {

        regStoreForm.storeRegUserConfirmPw.style.borderColor = "red";
        errorStoreConPass.innerHTML = "Please enter password again";

    }else if (regStoreForm.storeRegUserConfirmPw.value !== "" && regStoreForm.storeRegUserConfirmPw.value !== null && regStoreForm.storeRegUserConfirmPw.value.length <= 6) {

        regStoreForm.storeRegUserConfirmPw.borderColor = "red";
        errorStoreConPass.innerHTML = "Password must be more than 4 characters";

    }else if (regStoreForm.storeRegUserConfirmPw.value !== regStoreForm.storeRegUserPw.value) {

      regStoreForm.storeRegUserConfirmPw.borderColor = "red";
        errorStoreConPass.innerHTML = "Password does not match";

     }    else{
        errorStoreConPass.innerHTML = "";
        regStoreForm.storeRegUserConfirmPw.style.borderColor = "green";

    }
}
 regStoreForm.storeRegUserConfirmPw.addEventListener("blur", enterStoreConPassWord, false);


//REGISTRATION FOR JAVASCRIPT VALIDATION ENDS HERE

var loginFormForStore = document.forms.storeLoginForm;

var storeUserErrorInput = document.getElementById('userStoreError');
var storePassErrorInput = document.getElementById('passCodeStoreError');




function userNameStoreInput(){

      if (loginFormForStore.storeUserName.value === "" || regStoreForm.storeUserName.value === null) {

        loginFormForStore.storeUserName.style.borderColor = "red";
        storeUserErrorInput.innerHTML = "Please enter username";

    }else{
        storeUserErrorInput.innerHTML = "";
        loginFormForStore.storeUserName.style.borderColor = "green";

    }
}

loginFormForStore.storeUserName.addEventListener("blur", userNameStoreInput, false);




//check the password field input if it is empty


function passCodeOfStoreInput(){

      if (loginFormForStore.storeUserPw.value === "" || regStoreForm.storeUserPw.value === null) {

        loginFormForStore.storeUserPw.style.borderColor = "red";
        storePassErrorInput.innerHTML = "Please enter password";

    }else{
        storePassErrorInput.innerHTML = "";
        loginFormForStore.storeUserPw.style.borderColor = "green";

    }
}

loginFormForStore.storeUserPw.addEventListener("blur", passCodeOfStoreInput, false);

