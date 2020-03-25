addNewModalContent('deletePlaylist', 'mainOptions', 'areYouSure');


function addNewModalContent(buttonId, previousModalId, newModalId) {
    let button = document.getElementById(buttonId);
    let previousModalContent = document.getElementById(previousModalId);
    let newModalContent = document.getElementById(newModalId);
    button.addEventListener('click', (e) => {
        previousModalContent.classList.add('hidden');
        newModalContent.classList.add('shown');
    });
}

// add class 