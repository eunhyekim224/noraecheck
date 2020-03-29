let onePlaylistBtn = document.querySelector('#onePlaylist');
let allSongsBtn = document.querySelector('#allPlaylists');

let selectPlaylist = document.querySelector('#selectPlaylist');
let selectAllSongs = document.querySelector('#selectAllSongs');

onePlaylistBtn.addEventListener('click', showOptionForOnePlaylist);
allSongsBtn.addEventListener('click', showOptionForAllPlaylists);

function showOptionForOnePlaylist() {
    selectAllSongs.style.display = 'none';
    selectPlaylist.style.display = 'block';
}

function showOptionForAllPlaylists() {
    selectAllSongs.style.display = 'block';
    selectPlaylist.style.display = 'none';
}

// display/remove singer names 

let singerInput = document.getElementById('singer');
let enterBtn = document.getElementById('singerSubmit');
let listOfSingers = document.getElementById('listOfSingers');

singerInput.addEventListener('keyup', (e) => { if (e.keyCode == 13) { displaySinger(); }});
enterBtn.addEventListener('click', displaySinger);

removeSingerTrigger('deleteSinger');

function displaySinger() {
    if (singerInput.value.trim().length > 0) {
        let singerLi = createNode('li', {}, singerInput.value);
        let deleteBtn = createNode('input', {'type' : 'button', 'name' : 'deleteSinger', 'id' : 'deleteSinger'});
        singerLi.appendChild(deleteBtn);
        listOfSingers.appendChild(singerLi);
        singerInput.value = '';  
    } else {
        singerInput.placeholder = 'enter a name';
    } 
}

function createNode(element, attributes, content) {
    let createEl = document.createElement(element);
    for (let attr in attributes) {
        createEl.setAttribute(attr, attributes[attr]);
    }
    if (content) {
        text = document.createTextNode(content);
        createEl.appendChild(text);
    }
    return createEl;
}

function removeSingerTrigger(deleteBtnId) {
    document.addEventListener('click', (e) => {
        if (e.target && e.target.id == deleteBtnId) {
            listOfSingers.removeChild(e.target.parentNode);
        }
    });
}


// send singer names to backend 

let allSingerNames = [];
let challengeSetUpForm = document.querySelector('#songsAndScoreFlex');

challengeSetUpForm.addEventListener('submit', getSingers);
challengeSetUpForm.addEventListener('submit', addSingers);

function getSingers() {
    let singerNames = document.querySelectorAll('#listOfSingers li');
    for (let i=0, c=singerNames.length; i<c; i++) {
        allSingerNames.push(singerNames[i].textContent);
    }
}

function addSingers() {
    hiddenInput = document.querySelector('#allSingers');
    hiddenInput.value = allSingerNames;
}   
