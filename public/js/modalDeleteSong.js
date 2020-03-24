let deleteSongModal = document.getElementById('deleteSongModal');
let cancelDelSongButton = deleteSongModal.querySelector('.cancelDel');
let deleteSongButtons = document.getElementsByClassName('minusIcon');

showAndCloseModal(deleteSongModal, deleteSongButtons, cancelDelSongButton);
console.log(cancelDelSongButton);

function showAndCloseModals(modal, buttons, cancelButton) {
    showModal(modal, buttons);
    closeModal(modal, cancelButton)
}

function showModal(modal, showButtons) {
    for (let i = 0, c = showButtons.length; i < c; i++) {
        showButtons[i].addEventListener('click', () => {
            modal.style.display = "block";
            console.log(modal);
        });
    }
}

function closeModal(modal, cancelButton) {
    cancelButton.addEventListener('click', () => {
        console.log(cancelButton);
        modal.style.display = "none";
        console.log(modal);
    });
    window.addEventListener('click', (e) => {
        if (e.target == modal) {
            modal.style.display = "none";
        }
    });
}
