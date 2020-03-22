let playlistOptionsModal = document.getElementById("playlistOptionsModal");
let playlistOptionsButton = document.getElementById("playlistOptions");
let cancelDelButton = document.getElementById("cancelDel");
console.log(cancelDelButton);

showAndCloseModal(playlistOptionsModal, playlistOptionsButton, cancelDelButton);

function showAndCloseModal(modals, buttons, cancelButtons) {
    showModal(modals, buttons);
    closeModal(modals, cancelButtons);
}

function showModal(modal, button) {
    button.addEventListener('click', ()=> {
        modal.style.display = "block";
    }); 
}

function closeModal (modal, cancelButton) {
    if (cancelButton) {
        cancelButton.addEventListener('click', ()=> {
            modal.style.display = "none";
            location.reload();
        });
    } else {
        window.addEventListener('click', (e)=> {
            if (e.target == modal) {
                modal.style.display = "none";
                location.reload();
            }
        });        
    }

}


