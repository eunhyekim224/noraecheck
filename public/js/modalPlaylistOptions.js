let playlistOptionsModal = document.getElementById("playlistOptionsModal");
let playlistOptionsButton = document.getElementById("playlistOptions");
let cancelDelButton = playlistOptionsModal.querySelector(".cancelDel");

showAndCloseModal(playlistOptionsModal, playlistOptionsButton, cancelDelButton);

function showAndCloseModal(modals, buttons, cancelButton) {
    showModal(modals, buttons);
    closeModal(modals, cancelButton);
}

function showModal(modal, button) {
    button.addEventListener('click', () => {
        modal.style.display = "block";
    });
}

function closeModal(modal, cancelButton) {
    cancelButton.addEventListener('click', () => {
        modal.style.display = "none";
        location.reload();
    });
    window.addEventListener('click', (e) => {
        if (e.target == modal) {
            modal.style.display = "none";
            location.reload();
        }
    });
}