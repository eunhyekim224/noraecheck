function loadFile(entry, category) { //function takes inputs from these two variables
    var xhr = new XMLHttpRequest();

    xhr.open('GET', `https://api.manana.kr/karaoke/${category}/${entry}.json`);

    xhr.addEventListener('readystatechange', function() { //manage an asynchronous request in this function
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) { //if the file is loaded without error

            obj = JSON.parse(xhr.response);

            //make maps for the song+artist and code
            let tjCodeMap = new Map();
            let kumyoungCodeMap = new Map();
            //the array we'll return
            let arrayToReturn = [];

            for (let i = 0, c = obj.length; i < c; i++) {
                if (obj[i].brand === 'tj') {
                    let tjNameAndTitle = nameAndTitleCheck(obj[i].singer, obj[i].title, obj[i].brand);

                    tjNameAndTitle = tjNameAndTitle.toLowerCase().replace(/ /g, '');
                    tjCodeMap.set(tjNameAndTitle, obj[i].no);
                } else if (obj[i].brand === 'kumyoung') {
                    let kumNameAndTitle = nameAndTitleCheck(obj[i].singer, obj[i].title, obj[i].brand);

                    kumNameAndTitle = kumNameAndTitle.toLowerCase().replace(/ /g, '');
                    kumyoungCodeMap.set(kumNameAndTitle, obj[i].no);
                }

            }
            for (let i = 0, c = obj.length; i < c; i++) {
                if (obj[i].brand === 'tj' || obj[i].brand === 'kumyoung') {

                    let songKey = nameAndTitleCheck(obj[i].singer, obj[i].title, obj[i].brand);
                    songKey = songKey.toLowerCase().replace(/ /g, '');

                    if (tjCodeMap.has(songKey) && kumyoungCodeMap.has(songKey)) {
                        let songEntry = {
                            singer: obj[i].singer,
                            song: obj[i].title,
                            tj_code: tjCodeMap.get(songKey),
                            kumyoung_code: kumyoungCodeMap.get(songKey)
                        };
                        arrayToReturn.push(songEntry);
                        tjCodeMap.delete(songKey);
                        kumyoungCodeMap.delete(songKey);

                    } else if (tjCodeMap.has(songKey)) {
                        let songEntry = {
                            singer: obj[i].singer,
                            song: obj[i].title,
                            tj_code: tjCodeMap.get(songKey)
                        };
                        arrayToReturn.push(songEntry);
                        tjCodeMap.delete(songKey);

                    } else if (kumyoungCodeMap.has(songKey)) {
                        let songEntry = {
                            singer: obj[i].singer,
                            song: obj[i].title,
                            kumyoung_code: kumyoungCodeMap.get(songKey)
                        };
                        arrayToReturn.push(songEntry);
                        kumyoungCodeMap.delete(songKey);
                    }
                }

            }
            arrayToReturnSliced = arrayToReturn.slice(0, 10);
            // let json = JSON.stringify(arrayToReturn);
            // return arrayToReturn;
            if (arrayToReturnSliced.length > 0) {
                displayResults(arrayToReturnSliced);
            } else {
                notFound();
            }


        } else if (xhr.readyState === XMLHttpRequest.DONE && xhr.status !== 200 & xhr.status === 0) {

            alert('there was an error \n\n Code:' + xhr.status + '\nText : ' + xhr.statusText);

        }
    });
    xhr.send(null);
}

(function() {
    var reset = document.getElementById('resetSearch');
    var categories = document.getElementById('category');
    let input = document.getElementById('entry');
    let previousRequest,
        previousValue = input.value;


    reset.addEventListener('click', function() {
        let div_parent = document.querySelector('#searchResults');
        div_parent.innerHTML = "";
        entry.value = "";
    });


    input.addEventListener('keyup', function(e) {
        let div_parent = document.querySelector('#searchResults');
        div_parent.innerHTML = "";
        if (e.target.value) {
            if (e.target.value.length == 1) {
                return;
            }
            loadFile(e.target.value, categories.value);
        } else if (e.target.value != previousValue) {
            previousValue = e.target.value;

            if (previousRequest && previousRequest.readyState < XMLHttpRequest.DONE) {
                previousRequest.abort(); // if we have still a research running, we stop it
            }

            previousRequest = loadFile(previousValue); // we store the new request
        }
    });
})();


function nameAndTitleCheck(singer, title, brand) {
    let test, regex, nameAndTitle;
    if (brand === 'tj') {
        if (test = /\w+\(\w+.\w+ \w+\)/gi.test(singer)) {
            regex = singer.replace(/\(\w+.\w+ \w+\)/gi, '');
            nameAndTitle = regex + title;
        } else {
            nameAndTitle = singer + title;
        }
    } else if (brand === 'kumyoung') {
        if (test = /\w+ \(\w+.\w+ \w+\)/gi.test(title)) {
            regex = title.replace(/\(\w+.\w+ \w+\)/gi, '');
            nameAndTitle = singer + regex;
        } else {
            nameAndTitle = singer + title;
        }
    }
    return nameAndTitle;
}

function displayResults(array) {
    let div_parent = document.querySelector('#searchResults');
    div_parent.innerHTML = "";

    for (let i = 0, c = array.length; i < c; i++) {

        let searchResults = createNode('form', { 'class': 'resultOption' });
        let songImgDiv = createNode('div', { 'class': 'songImg' });
        let songImg = createNode('img', { 'src': 'public/images/songResult3.png', 'title': 'Song icon' });
        let songDiv = createNode('div');
        let song = createNode('p', { 'class': 'songTitle' }, array[i].song);
        let singer = createNode('p', {}, 'by ' + array[i].singer);
        let brandCodes = createNode('div', { 'class': 'brandCodes songBrandCodes' });
        let tjBrandWrapper = createNode('p', { 'class': 'songListBrandCodes' });
        let kyBrandWrapper = createNode('p', { 'class': 'songListBrandCodes' });
        let tjBrand = createNode('p', {}, 'TJ');
        let kumyoungBrand = createNode('p', {}, 'KY');
        let code = createNode('p', {}, array[i].tj_code);
        let code2 = createNode('p', {}, array[i].kumyoung_code);
        let addIcon = createNode('div', { 'class': 'addIcon' });
        let iconImg = createNode('img', { 'src': 'public/images/plusIcon4.png', 'title': 'Plus icon', 'class': 'addPlaylist' });


        let tjCode = array[i].tj_code ? array[i].tj_code : '';
        let kumgoungCode = array[i].kumyoung_code ? array[i].kumyoung_code : '';

        let hiddenSong = createNode('input', { 'type': 'hidden', 'name': 'hiddenSong', 'value': array[i].song });
        let hiddenSinger = createNode('input', { 'type': 'hidden', 'name': 'hiddenSinger', 'value': array[i].singer });
        let hiddenTj = createNode('input', { 'type': 'hidden', 'name': 'hiddenTj', 'value': tjCode });
        let hiddenKumyoung = createNode('input', { 'type': 'hidden', 'name': 'hiddenKumyoung', 'value': kumgoungCode });
        let hiddenAction = createNode('input', { 'type': 'hidden', 'name': 'action', 'value': 'searchModal' });
        let searchCache = createNode('input', { 'type': 'hidden', 'name': 'searchCache', 'value': entry.value });
        let categoryCache = createNode('input', { 'type': 'hidden', 'name': 'categoryCache', 'value': category.value });

       
        iconImg.addEventListener('click', () => {
            searchResults.submit();
        });
        // for (let i=0; i<modals.length; i++) {
        //     iconImg.addEventListener('click', ()=> {
        //         //modals[i].style.display = "block";
        //         searchResults.submit();
        //     }); 
        // }

        songImgDiv.appendChild(songImg);
        addIcon.appendChild(iconImg);

        songDiv.appendChild(song);
        songDiv.appendChild(singer);
        songDiv.appendChild(brandCodes);
        searchResults.appendChild(songImgDiv)
        searchResults.appendChild(songDiv);
        searchResults.appendChild(addIcon);

        searchResults.appendChild(hiddenSong);
        searchResults.appendChild(hiddenSinger);
        searchResults.appendChild(hiddenTj);
        searchResults.appendChild(hiddenKumyoung);
        searchResults.appendChild(hiddenAction);
        searchResults.appendChild(searchCache);
        searchResults.appendChild(categoryCache);

        if (array[i].tj_code && array[i].kumyoung_code) {
            tjBrandWrapper.appendChild(tjBrand);
            tjBrandWrapper.appendChild(code);
            kyBrandWrapper.appendChild(kumyoungBrand);
            kyBrandWrapper.appendChild(code2);
            brandCodes.appendChild(tjBrandWrapper);
            brandCodes.appendChild(kyBrandWrapper);
        } else if (array[i].tj_code) {
            tjBrandWrapper.appendChild(tjBrand);
            tjBrandWrapper.appendChild(code);
            brandCodes.appendChild(tjBrandWrapper);
        } else if (array[i].kumyoung_code) {
            kyBrandWrapper.appendChild(kumyoungBrand);
            kyBrandWrapper.appendChild(code2);
            brandCodes.appendChild(kyBrandWrapper);
        }

        div_parent.appendChild(searchResults);
    }
}

function notFound() {
    let div_parent = document.querySelector('#searchResults');
    div_parent.innerHTML = "";

    let error = createNode('p', { 'class': 'errorMsg' }, 'Not Found');
    div_parent.appendChild(error);
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


let modals = document.getElementsByClassName("modalSearch");


function autocorrect(searchedValue, category) {
    let div_parent = document.querySelector('#searchResults');
    div_parent.innerHTML = "";
    if (searchedValue) {
        loadFile(searchedValue, category);
    }
};

let modalDisplay = document.getElementById('modalDisplay');
if (modalDisplay.value === 'on') {
    for (let i = 0; i < modals.length; i++) {
        modals[i].style.display = "block";
        playlistId = document.getElementById('playlistId');
        searchCache = document.getElementById('searchCache');
        searchCategory = document.getElementById('searchCategory');
        switchOptions(searchCategory.value);
        finalSearchCache = searchCache.value.replace(/_/g, " ");
        entry.value = finalSearchCache;
        autocorrect(finalSearchCache, searchCategory.value);

    }
}