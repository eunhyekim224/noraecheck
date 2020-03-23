
function getModalContent(buttonID, parent) {
    switch(buttonID) {
        case "editPlaylist" : file = "./view/editPlaylist.php"; break;
        case "deletePlaylist" : file = "./view/deletePlaylist.php"; break;
        case 'allOptions' : file = "./view/playlistAllOptions.php"; break;
        default : break;
    }

    let xhr = new XMLHttpRequest();
    xhr.open('GET', file);
    xhr.addEventListener('readystatechange', () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            document.getElementById(parent).innerHTML = '<div>' + xhr.responseText + '</div>';
        } else if (xhr.readyState === XMLHttpRequest.DONE && xhr.status != 200) {
            alert('There is an error !\n\nCode :' + xhr.status + '\nText : ' + xhr.statusText);
        }
    });
    
    xhr.send(null);
}

addModalButtonEvents('editPlaylist', 'modalContent');
addModalButtonEvents('deletePlaylist', 'modalContent');
// addModalButtonEvents('backToMainMenu', 'modalContent');

function addModalButtonEvents(elementId, parent) {
    let button = document.getElementById(elementId);
    button.addEventListener('click', (e) => {
        getModalContent(e.target.id, parent);
    }); 
}


