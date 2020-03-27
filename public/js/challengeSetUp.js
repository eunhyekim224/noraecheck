// when click on 'onePlaylist' -> show select dropdown
// when click on 'allPlaylists' -> show question and input number

let onePlaylistBtn = document.querySelector('#onePlaylist');
let allSongsBtn = document.querySelector('#allPlaylists');

let chalOptionsBtns = document.querySelector('#chalPlaylistOptionsBtns');
let selectPlaylist = document.querySelector('#selectPlaylist');
let selectAllSongs = document.querySelector('#selectAllSongs');

showChallengeOptions(onePlaylistBtn, selectPlaylist, selectPlaylist);
showChallengeOptions(allSongsBtn, selectAllSongs, chalOptionsBtns);

function showChallengeOptions(btn, option, previousElem) {
    btn.addEventListener('click', (e) => {
        console.log(previousElem.nextElementSibling);
        previousElem.nextElementSibling.style.display = 'none';
        option.style.display = 'block';
    });
}



