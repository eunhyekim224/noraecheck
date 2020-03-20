let modals = document.getElementsByClassName("modal");
let cancelButtons = document.getElementsByName("cancel");
let newPlaylistName = document.getElementById("playlistName");

let newPlaylistButton = document.getElementById('newPlaylistBtn');
showModal(modals, newPlaylistButton);
closeModal(modals, cancelButtons);

function showModal(modals, button) {
    for (let i=0; i<modals.length; i++) {
        button.addEventListener('click', ()=> {
            modals[i].style.display = "block";
        }); 
    }
}

function closeModal(modals, cancelButtons) {
    for (let i=0; i<modals.length; i++) {
        cancelButtons[i].addEventListener('click', ()=> {
            modals[i].style.display = "none";
            newPlaylistName.value = "";
        });
        window.addEventListener('click', (e)=> {
            if (e.target == modals[i]) {
                modals[i].style.display = "none";
                newPlaylistName.value = "";
            }
        });           
    }
}

