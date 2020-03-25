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
searchNewPlaylistSubmit.addEventListener('click', () => {
    searchNewPlaylist.submit();
});
superBox = document.getElementsByClassName('superBox')[0];
newPlaylistBtn = document.getElementsByName('newPlaylist')[0];
newPlaylistBtn.addEventListener('click', () => {
    superBox.parentNode.removeChild(superBox);
    console.log("works");
    searchNewPlaylist.classList.add('visibleSearchNewPlaylist');

});