addNewModalContent('deletePlaylist', 'mainOptions', 'areYouSure');

function addNewModalContent(buttonId, previousModalId, newModalId) {
    let button = document.getElementById(buttonId);
    let previousModalContent = document.getElementById(previousModalId);
    let newModalContent = document.getElementById(newModalId);
    button.addEventListener('click', (e) => {
        previousModalContent.style.display = 'none';
        newModalContent.style.display = 'block';
    });
}

