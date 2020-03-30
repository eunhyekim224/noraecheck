const btnSign = document.getElementById('signInText');
btnSign.onclick = function() {
    const signInMod = document.getElementById('signIn');
    signInMod.style.display = "block";
}

const btnCreate = document.getElementById('createAccount');
btnCreate.onclick = function() {
    const signUpMod = document.getElementById('signUp');
    signUpMod.style.display = "block";
}

function setDisplayModals(elt) {
    elt.addEventListener("click", function(e) {
        const signInMod = document.getElementById('signIn');
        const signUpMod = document.getElementById('signUp');
        if (e.target.className == "close" || e.target == signInMod || e.target == signUpMod) {
            hideModal(signInMod);
            hideModal(signUpMod);
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
        // const emregex = /(.+)@(.+){2,}\.(.+){2,}/;
        // const pwregex = /^[a-zA-Z0-9]{8,}/g;
        // const logregex = /^[a-zA-Z0-9]{4,}/g;
        // const pwd = document.getElementById('pwd');
        // const pwdConf = document.getElementById('pwdConf');
        // const em = document.getElementById('email');
        // const lg = document.getElementById('loginNew');
        // pwd.value.match(pwregex);
        // em.value.match(emregex);
        // lg.value.match(logregex);
        // pwd.value == pwdConf.value;
        signUpForm.submit();
    } else {
        e.preventDefault();
        error = signUpForm.querySelector("p.error");
        error.style.display = "block";
    }
}
/********EXECUTION******* */

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