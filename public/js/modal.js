let newPlaylistModal = document.getElementsByClassName("modal")[0];
let newPlaylistCancelButton = document.getElementsByName("cancel")[0];
let newPlaylistName = document.getElementById("playlistName");
let newPlaylistButton = document.getElementById('newPlaylistBtn');

<<<<<<< HEAD
function showModal(modals, button) {
    for (let i = 0; i < modals.length; i++) {
        button.addEventListener('click', () => {
            modals[i].style.display = "block";
        });
    }
}

function closeModal(modals, cancelButtons) {
    for (let i = 0; i < modals.length; i++) {
        cancelButtons[i].addEventListener('click', () => {
            modals[i].style.display = "none";
            newPlaylistName.value = "";
        });
        window.addEventListener('click', (e) => {
            if (e.target == modals[i]) {
                modals[i].style.display = "none";
                newPlaylistName.value = "";
            }
        });
=======
showAndCloseModal(newPlaylistModal, newPlaylistButton, newPlaylistCancelButton);

function showAndCloseModal(modals, buttons, cancelButtons) {
    showModal(modals, buttons);
    closeModal(modals, cancelButtons)
}

function showModal(modal, button) {
    button.addEventListener('click', ()=> {
        modal.style.display = "block";
    }); 
}

function closeModal(modal, cancelButton) {
    cancelButton.addEventListener('click', ()=> {
        modal.style.display = "none";
    });
    window.addEventListener('click', (e)=> {
        if (e.target == modal) {
            modal.style.display = "none";
        }
    });        
    if (newPlaylistName.value) {
        newPlaylistName.value = "";
>>>>>>> ad57cd00c64030893c621aea86422da45ec60e74
    }
}