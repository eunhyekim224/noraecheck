let onePlaylistBtn = document.querySelector('#onePlaylist');
let allSongsBtn = document.querySelector('#allPlaylists');

let chalOptionsBtns = document.querySelector('#chalPlaylistOptionsBtns');
let selectPlaylist = document.querySelector('#selectPlaylist');
let selectAllSongs = document.querySelector('#selectAllSongs');

showChallengeOptions(onePlaylistBtn, selectPlaylist, selectPlaylist);
showChallengeOptions(allSongsBtn, selectAllSongs, chalOptionsBtns);

function showChallengeOptions(btn, option, previousElem) {
    btn.addEventListener('click', (e) => {
        previousElem.nextElementSibling.style.display = 'none';
        option.style.display = 'block';
    });
}

// display singer names 

let singersToDisplay = [];
let allSingerNames = [];
displaySingersTrigger('singer', 'singerSubmit', 'listOfSingers', '#listOfSingers li');

function displaySingersTrigger(singerInputId, enterBtnId, listId, singerId) {
    let singer = document.getElementById(singerInputId);
    let enterBtn = document.getElementById(enterBtnId);
    singer.addEventListener('keyup', (e) => {
        if (e.keyCode === 13) {
            addSinger(singer, listId);
            singer.value = '';
            singersToDisplay = [];
        }
    });
    enterBtn.addEventListener('click', (e) => {
        addSinger(singer, listId);
        singer.value = '';
        singersToDisplay = [];
    });
}

function addSinger(singer, listId) {
    singersToDisplay.push(singer.value);
    displaySingers(singersToDisplay, listId);
}

function displaySingers(singers, listId) {
    let listOfSingers = document.getElementById(listId);
    for (let i=0, c=singers.length; i<c; i++) {
            let singerLi = document.createElement('li');
            let singer = document.createTextNode(singers[i]);
            singerLi.appendChild(singer);
            listOfSingers.appendChild(singerLi);
    }
}   

// send singer names to backend 

addSingersTrigger('#listOfSingers li','#allSingers', '#songsAndScoreFlex')

function addSingersTrigger(singerId, hiddenInputId, formId) {
    let form = document.querySelector(formId);
    form.addEventListener('submit', (e) => {
        getSingers(singerId);
        addSingers(allSingerNames, hiddenInputId)
    });
}

function getSingers(singerId) {
    let singerNames = document.querySelectorAll(singerId);
    for (let i=0, c=singerNames.length; i<c; i++) {
        allSingerNames.push(singerNames[i].textContent);
    }
}

function addSingers(allNames, hiddenInputId) {
    hiddenInput = document.querySelector(hiddenInputId);
    hiddenInput.value = allNames;
}   




