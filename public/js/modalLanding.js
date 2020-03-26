// gets the buttons and gives the user a pop up if there are errors on the modal
const SubmitRegBtn = document.getElementById('submitRegister');
const CreateActBtn = document.getElementById('createAccount');
// const SignInBtn = document.getElementById('signInText');
// const Login = document.getElementById('loginForm');

// function show_popup_login() {
//     const form = document.forms["form"]
//         ["username"].value;
//     if (form == "") {
//         SignInMod.style.display = 'block';
//         return false;
//     }
// }

// const error = 'false';
// if (error == 'true') {
//     SignInMod.style.display = 'block';
//     SignUpMod.style.display = 'block';
// }

// test if pop up shows automatically

// function show_popup() {
//     SignInMod.style.display = 'block';
//     SignUpMod.style.display = 'block';
// }
// window.onload = show_popup;

// literal array of error msg 
// two separate for login and sign up
function validate_sign_in() {
    const SignInError = ['missingField', 'logError', 'passError'];
    const username = document.getElementById('username');
    const pwd = document.getElementById('password');
    // const error =
    // if (username.value && pwd.value == "") {

    // }
}

const SignUpError = ['logOld', 'mailError', 'passError'];


// function show_popup_login() {
//     SignInMod.style.display = 'block';
// }

// function show_popup_create() {
//     SignUpMod.style.display = 'block';
// }

// SubmitRegBtn.addEventListener('click', show_popup_create);
// SignInBtn.addEventListener('click', show_popup_login);

// CreateActBtn.addEventListener('click', show_popup);

// SignInMod.addEventListener('click', show_popup);
// SignUpMod.addEventListener('click', show_popup);

function setDisplayModals(elt) {
    elt.addEventListener("click", function(e) {
        const SignInMod = document.getElementById('SignIn');
        const SignUpMod = document.getElementById('SignUp');
        if (e.target.className == "close" || e.target == SignInMod || e.target == SignUpMod) {
            hideModal(SignInMod);
            hideModal(SignUpMod);
            errors = document.querySelectorAll("p.error");
            for (let i = 0; i < errors.length; i++) {
                errors[i].style.display = "none";
            }
        }
    });
}

function hideModal(elt) {
    elt.style.display = "none";
}

function signInVerify(signInForm, e) {
    if (signInForm.querySelector('#username').value && signInForm.querySelector('#password').value) {
        signInForm.submit();
    } else {
        e.preventDefault();
        error = signInForm.querySelector("p.error");
        error.style.display = "block";
    }
}

function signUpVerify(signUpForm, e) {
    if (signUpForm.querySelector('#loginNew').value && signUpForm.querySelector('#email').value && signUpForm.querySelector('#pwd').value && signUpForm.querySelector('#pwdConf').value) {
        //other tests like regex etc....
        // signUpForm.submit();
    } else {
        e.preventDefault();
        error = signUpForm.querySelector("p.error");
        console.log(error);
        error.style.display = "block";
    }
}

/* *******EXECUTION******* */
{
    function init() {
        setDisplayModals(window);
        closeModals = document.querySelectorAll("span.close");
        for (let i = 0; i < closeModals.length; i++) {
            setDisplayModals(closeModals[i]);
        }

        const submitRegister = document.getElementById('submitRegister');
        submitRegister.addEventListener("click", function(e) {
            signInVerify(document.getElementById('loginForm'), e);
        });

        const submitSignUp = document.getElementById('submitSignUp');
        submitSignUp.addEventListener("click", function(e) {
            signUpVerify(document.getElementById('signUpForm'), e);
        });
        // for the button fo the creation

    }
    init();
}