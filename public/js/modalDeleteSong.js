let deleteSongModals = document.getElementsByClassName('deleteSongModal');
let deleteSongButtons = document.getElementsByClassName('minusIcon');

showAndCloseModals(deleteSongModals, deleteSongButtons);

function showAndCloseModals(modals, buttons) {
    showModals(modals, buttons);
    closeModals(modals);
}

function showModals(modals, showButtons) {
    for (let i = 0, c = showButtons.length; i < c; i++) {
        showButtons[i].addEventListener('click', () => {
            modals[i].style.display = "block";
        });
    }
}

function closeModals(modals) {
    for (let i = 0, c = modals.length; i < c; i++) {
        cancelButton = modals[i].querySelector('.cancelDel');
        cancelButton.addEventListener('click', () => {
            modals[i].style.display = "none";
        });

        window.addEventListener('click', (e) => {
            if (e.target == modals[i]) {
                modals[i].style.display = "none";
            }
        });
    }
}