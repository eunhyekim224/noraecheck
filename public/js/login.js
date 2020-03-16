let signInBox = document.getElementById('signIn');



signInBox.addEventListener('click',function(){
    let text = document.getElementById('signInText');
    this.removeChild(text);
    this.style.width='40%';

    loginForm = document.getElementById('loginForm')
    loginForm.style.display="block";
 
});

