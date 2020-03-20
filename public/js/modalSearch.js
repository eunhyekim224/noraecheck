let modals2 = document.getElementsByClassName("modalSearch");
let closeButtons = document.getElementsByClassName("close");
let cancelButtons = document.getElementsByName("cancel");
console.log(cancelButtons);



closeModal(modals2, closeButtons, cancelButtons);


function closeModal(modals2, closeButtons, cancelButtons) {
    for (let i=0; i<modals2.length; i++) {
        closeButtons[i].addEventListener('click', ()=> {
            modals2[i].classList.add = "modalOn";
        });
        cancelButtons[i].addEventListener('click', ()=> {
            modals2[i].classList.add = "modalOn";
        });
        window.addEventListener('click', (e)=> {
            if (e.target == modals[i]) {
                modals2[i].classList.add = "modalOn";
            }
        });           
    } 
}
