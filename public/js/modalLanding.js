const SignInMod = document.getElementById('SignIn');
const SignUpMod = document.getElementById('SignUp');
window.onclick = function(event) {
    if (event.target == SignInMod || event.target == SignUpMod) {
        SignInMod.style.display = "none";
        SignUpMod.style.display = "none";
    }

}

// give new name
// clean up the js file
// make the function readable by others
// change the name