let modals = document.getElementsByClassName("modal");
let closeButtons = document.getElementsByClassName("close");
let cancelButtons = document.getElementsByName("cancel");
console.log(cancelButtons);

closeModal(modals, closeButtons, cancelButtons);


function closeModal(modals, closeButtons, cancelButtons) {
    for (let i = 0; i < modals.length; i++) {
        closeButtons[i].addEventListener('click', () => {
            modals[i].style.display = "none";
        });
        cancelButtons[i].addEventListener('click', () => {
            modals[i].style.display = "none";
        });
        window.addEventListener('click', (e) => {
            if (e.target == modals[i]) {
                modals[i].style.display = "none";
            }
        });
    }
}