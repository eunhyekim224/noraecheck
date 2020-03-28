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

// display/remove singer names 

displaySingerTrigger('singer', 'singerSubmit', 'listOfSingers', '#listOfSingers li');
removeSingerTrigger('deleteSinger', 'listOfSingers');

function displaySingerTrigger(singerInputId, enterBtnId, listId) {
    let singer = document.getElementById(singerInputId);
    let enterBtn = document.getElementById(enterBtnId);
        singer.addEventListener('keyup', (e) => {
            if (e.keyCode === 13) {
                if (singer.value.trim().length > 0) {
                    displaySinger(singer, listId);
                    singer.value = '';
                } else {
                    singer.placeholder = 'enter a name';
                } 
            }
        });
        enterBtn.addEventListener('click', (e) => {
            if (singer.value.trim().length > 0) {
                displaySinger(singer, listId);
                singer.value = '';
            } else {
                singer.placeholder = 'enter a name';
            } 
        });
}

function displaySinger(singer, listId) {
    let listOfSingers = document.getElementById(listId);
    let singerLi = createNode('li', {}, singer.value);
    let deleteBtn = createNode('input', {'type' : 'button', 'name' : 'deleteSinger', 'id' : 'deleteSinger'});
    singerLi.appendChild(deleteBtn);
    listOfSingers.appendChild(singerLi);
}   

function removeSingerTrigger(deleteBtnId, listId) {
    let listOfSingers = document.getElementById(listId);
    document.addEventListener('click', (e) => {
        if (e.target && e.target.id == deleteBtnId) {
            listOfSingers.removeChild(e.target.parentNode);
        }
    });
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

function createNode(element, attributes, content) {
    let createEl = document.createElement(element);
    for (var attr in attributes) {
        createEl.setAttribute(attr, attributes[attr]);
    }
    if (content) {
        text = document.createTextNode(content);
        createEl.appendChild(text);
    }
    return createEl;
}



