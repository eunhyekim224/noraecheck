let modals2 = document.getElementsByClassName("modalSearch");
// let closeButtons = document.getElementsByClassName("close");
let cancelButtons = document.getElementsByName("cancel");
console.log(cancelButtons);



closeModal(modals2, cancelButtons);


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
    }
}
searchNewPlaylist = document.getElementById("searchNewPlaylist");
searchNewPlaylistSubmit = document.getElementById("searchNewPlaylistSubmit");
superBox = document.getElementsByClassName('superBox')[0];
// searchNewPlaylistSubmit.addEventListener('click', ()=> {
//     searchNewPlaylist.submit();
// });

playlistId = document.getElementById('playlistId');
playlists = document.getElementById('playlistId').children;
newPlaylistBtn = document.getElementsByName('newPlaylist')[0];
label = document.getElementsByTagName('label')[0];
modalFormAction = document.getElementById('modalFormAction');
newPlaylistInputText = document.getElementById('playlistName');
newPlaylistBtn.addEventListener('click', ()=> {
    playlistId.parentNode.removeChild(playlistId);
    newPlaylistBtn.parentNode.removeChild(newPlaylistBtn);
    label.parentNode.removeChild(label);
    modalFormAction.value = "addSongToNewPlaylist";
    searchNewPlaylist.classList.add('visibleSearchNewPlaylist');
    newPlaylistInputText.focus();
    
});
