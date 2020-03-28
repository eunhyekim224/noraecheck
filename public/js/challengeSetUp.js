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

displaySingerTrigger('singer', 'singerSubmit', 'listOfSingers', '#listOfSingers li');

function displaySingerTrigger(singerInputId, enterBtnId, listId) {
    let singer = document.getElementById(singerInputId);
    let enterBtn = document.getElementById(enterBtnId);
        singer.addEventListener('keyup', (e) => {
            if (e.keyCode === 13) {
                if (singer.value.length > 0) {
                    displaySinger(singer, listId);
                    singer.value = '';
                }    
            }
        });
        enterBtn.addEventListener('click', (e) => {
            if (singer.value.length > 0) {
                displaySinger(singer, listId);
                singer.value = '';
            }
        });
}

function displaySinger(singer, listId) {
    let listOfSingers = document.getElementById(listId);
    let singerLi = document.createElement('li');
    let singerName = document.createTextNode(singer.value);
    singerLi.appendChild(singerName);
    listOfSingers.appendChild(singerLi);
}   

// send singer names to backend 

let allSingerNames = [];
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




