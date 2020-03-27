// gets the buttons and gives the user a pop up if there are errors on the modal
const SubmitRegBtn = document.getElementById('submitRegister');
const CreateActBtn = document.getElementById('createAccount');

// const SignInBtn = document.getElementById('signInText');
// const Login = document.getElementById('loginForm');

// test if pop up shows automatically

// function show_popup() {
//     SignInMod.style.display = 'block';
//     SignUpMod.style.display = 'block';
// }
// window.onload = show_popup;
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
    const emregex = /(.+)@(.+){2,}\.(.+){2,}/;
    const pwregex = /^[a-zA-Z0-9]{8,}/g;
    const logregex = /^[a-zA-Z0-9]{4,}/g;

    const pwd = document.getElementById('pwd');
    const pwdConf = document.getElementById('pwdConf');
    const em = document.getElementById('email');
    const lg = document.getElementById('loginland');

    if (signUpForm.querySelector('#loginNew').value && signUpForm.querySelector('#email').value && signUpForm.querySelector('#pwd').value && signUpForm.querySelector('#pwdConf').value) {
        pwd.value.match(pwregex);
        em.value.match(emregex);
        lg.value.match(logregex);
        pwd.value == pwdConf;
        //other tests like regex etc....
        signUpForm.submit();
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
        // for the button to the creation

    }
    init();
}