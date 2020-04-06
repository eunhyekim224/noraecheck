let newPlaylistModal = document.getElementsByClassName("modal")[0];
let newPlaylistCancelButton = document.getElementsByName("cancel")[0];
let newPlaylistName = document.getElementById("playlistName");
let newPlaylistButton = document.getElementById('newPlaylistBtn');

showAndCloseModal(newPlaylistModal, newPlaylistButton, newPlaylistCancelButton);

function showAndCloseModal(modals, buttons, cancelButtons) {
    showModal(modals, buttons);
    closeModal(modals, cancelButtons)
}

function showModal(modal, button) {
    button.addEventListener('click', () => {
        modal.style.display = "block";
    });
}

function closeModal(modal, cancelButton) {
    cancelButton.addEventListener('click', () => {
        modal.style.display = "none";
    });
    window.addEventListener('click', (e) => {
        if (e.target == modal) {
            modal.style.display = "none";
        }
    });
    if (newPlaylistName.value) {
        newPlaylistName.value = "";
    }
}