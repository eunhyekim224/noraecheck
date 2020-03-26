// gets the div modal and allows user to close if they click outside the modal
const SignInMod = document.getElementById('SignIn');
const SignUpMod = document.getElementById('SignUp');

// gets the buttons and gives the user a pop up if there are errors on the modal
const SubmitRegBtn = document.getElementById('submitRegister');
const CreateActBtn = document.getElementById('createAccount');
// const SignInBtn = document.getElementById('signInText');

// const Login = document.getElementById('loginForm');

// function show_popup() {
// 
//     const error = 'false';
//     if ($error == 'true') {
//         SignInMod.style.display = 'block';
//         SignUpMod.style.display = 'block';
//     }
// }

function show_popup() {
    SignInMod.style.display = 'block';
    SignUpMod.style.display = 'block';
}

// function show_popup_login() {
//     SignInMod.style.display = 'block';
// }

// function show_popup_create() {
//     SignUpMod.style.display = 'block';
// }

SubmitRegBtn.addEventListener('click', show_popup_create);
SignInBtn.addEventListener('click', show_popup_login);

window.onload = show_popup;

// CreateActBtn.addEventListener('click', show_popup);

// SignInMod.addEventListener('click', show_popup);
// SignUpMod.addEventListener('click', show_popup);

window.onclick = function(event) {
    if (event.target == SignInMod || event.target == SignUpMod) {
        SignInMod.style.display = "none";
        SignUpMod.style.display = "none";
    }
}