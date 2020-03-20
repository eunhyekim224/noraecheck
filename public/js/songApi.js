function loadFile(entry,category){//function takes inputs from these two variables
    var xhr = new XMLHttpRequest();

    xhr.open('GET', `https://api.manana.kr/karaoke/${category}/${entry}.json`);

    xhr.addEventListener('readystatechange', function(){ //manage an asynchronous request in this function
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) { //if the file is loaded without error
            
            obj = JSON.parse(xhr.response);
            
            //make maps for the song+artist and code
            let tjCodeMap = new Map();
            let kumyoungCodeMap = new Map();
            //the array we'll return
            let arrayToReturn = [];
            
            for (let i = 0,c = obj.length; i < c; i++){
                if(obj[i].brand === 'tj'){
                    let tjNameAndTitle = nameAndTitleCheck(obj[i].singer, obj[i].title, obj[i].brand);

                    tjNameAndTitle = tjNameAndTitle.toLowerCase().replace(/ /g,'');
                    tjCodeMap.set(tjNameAndTitle,obj[i].no);
                } else if(obj[i].brand === 'kumyoung'){
                    let kumNameAndTitle = nameAndTitleCheck(obj[i].singer, obj[i].title, obj[i].brand);

                    kumNameAndTitle = kumNameAndTitle.toLowerCase().replace(/ /g,'');
                    kumyoungCodeMap.set(kumNameAndTitle,obj[i].no);
                }
        
            }
            for (let i = 0,c = obj.length; i < c; i++) {
                if (obj[i].brand === 'tj' || obj[i].brand === 'kumyoung') {

                    let songKey = nameAndTitleCheck(obj[i].singer, obj[i].title, obj[i].brand);
                    songKey = songKey.toLowerCase().replace(/ /g,'');

                    if(tjCodeMap.has(songKey) && kumyoungCodeMap.has(songKey)){
                        let songEntry = {
                            singer: obj[i].singer,
                            song: obj[i].title,
                            tj_code: tjCodeMap.get(songKey),
                            kumyoung_code: kumyoungCodeMap.get(songKey)
                        };
                        arrayToReturn.push(songEntry);
                        tjCodeMap.delete(songKey);
                        kumyoungCodeMap.delete(songKey);
                        
                    } else if(tjCodeMap.has(songKey)){
                        let songEntry = {
                            singer: obj[i].singer,
                            song: obj[i].title,
                            tj_code: tjCodeMap.get(songKey)
                        };
                        arrayToReturn.push(songEntry);
                        tjCodeMap.delete(songKey);
                        
                    } else if(kumyoungCodeMap.has(songKey)){
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
            arrayToReturnSliced = arrayToReturn.slice(0,10);
            console.log(arrayToReturnSliced);
            // let json = JSON.stringify(arrayToReturn);
            // return arrayToReturn;
            if (arrayToReturnSliced.length > 0) {
                displayResults(arrayToReturnSliced);
            } else {
                notFound();
            }
            
            
        } else if (xhr.readyState === XMLHttpRequest.DONE && xhr.status !== 200 & xhr.status === 0){

            alert('there was an error \n\n Code:' + xhr.status + '\nText : ' + xhr.statusText);
            
        }
    });
    xhr.send(null);
}

(function(){
    var submit = document.getElementById('submit');
    var categories = document.getElementById('category');
    let input = document.getElementById('entry');
    let previousRequest,
        previousValue = input.value;

    // submit.addEventListener('click', function() {
    //     loadFile(input.value,categories.value);   
    // });

    input.addEventListener('keyup', function(e) {
        // console.log("e.target.value.length", e.target.value.length>1);
        let div_parent = document.querySelector('#searchResults');
        div_parent.innerHTML = "";
        if (e.target.value) {
            if(e.target.value.length == 1){ 
                return;
            }
            loadFile(e.target.value,categories.value);
        } else if (e.target.value != previousValue) {
            previousValue = e.target.value;
		
            if (previousRequest && previousRequest.readyState < XMLHttpRequest.DONE) {
                previousRequest.abort(); // if we have still a research running, we stop it
            }
    
            previousRequest = loadFile(previousValue); // we store the new request
        } 
    });
})();


function nameAndTitleCheck(singer,title, brand) {
    let test, regex, nameAndTitle;
    if (brand === 'tj'){
        if (test = /\w+\(\w+.\w+ \w+\)/gi.test(singer)) {
            regex = singer.replace(/\(\w+.\w+ \w+\)/gi,'');
            nameAndTitle = regex + title;
        } else {
            nameAndTitle = singer + title;
        }
    }else if (brand === 'kumyoung'){
        if (test = /\w+ \(\w+.\w+ \w+\)/gi.test(title)) {
            regex = title.replace(/\(\w+.\w+ \w+\)/gi,'');
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

    for (let i=0,c=array.length; i<c; i++) {
        let searchResults = document.createElement('form');
        let songImgDiv = document.createElement('div');
        let songImg = document.createElement('img');
        let songDiv = document.createElement('div');
        let song = document.createElement('p');
        let songText = document.createTextNode(array[i].song);
        let singer = document.createElement('p');
        let singerText = document.createTextNode('by '+ array[i].singer);
        let brandCodes = document.createElement('div');
        let tjBrand = document.createElement('p');
        let tjText = document.createTextNode('TJ');
        let kumyoungBrand = document.createElement('p');
        let kumyoungText = document.createTextNode('Kumyoung');
        let code = document.createElement('p');
        let codeText = document.createTextNode(array[i].tj_code);
        let code2 = document.createElement('p');
        let code2Text = document.createTextNode(array[i].kumyoung_code);
        let addIcon = document.createElement('div');
        let iconImg = document.createElement('img');

        let hiddenSinger = document.createElement('input');
        let hiddenSong = document.createElement('input');
        let hiddenTj = document.createElement('input');
        let hiddenKumyoung = document.createElement('input');
        let hiddenAction = document.createElement('input');

        searchResults.setAttribute('class','resultOption');
        song.setAttribute('class','songTitle');
        songImgDiv.setAttribute('class','songImg');
        brandCodes.setAttribute('class','brandCodes');
        addIcon.setAttribute('class','addIcon');
        songImg.setAttribute('src','public/images/songResult.png');
        songImg.setAttribute('title','Song icon');
        iconImg.setAttribute('src','https://upload.wikimedia.org/wikipedia/commons/9/9e/Plus_symbol.svg');
        iconImg.setAttribute('title','Plus icon');
        iconImg.setAttribute('class','addPlaylist');

        hiddenSong.setAttribute('type','hidden');
        hiddenSinger.setAttribute('type','hidden');
        hiddenTj.setAttribute('type','hidden');
        hiddenKumyoung.setAttribute('type','hidden');
        hiddenAction.setAttribute('type','hidden');
        

        hiddenSong.setAttribute('name','hiddenSong');
        hiddenSinger.setAttribute('name','hiddenSinger');
        hiddenTj.setAttribute('name','hiddenTj');
        hiddenKumyoung.setAttribute('name','hiddenKumyoung');
        hiddenAction.setAttribute('name','action');

        let tjCode = array[i].tj_code ? array[i].tj_code : '';
        let kumgoungCode = array[i].kumyoung_code ? array[i].kumyoung_code : '';

        hiddenSong.setAttribute('value',array[i].song);
        hiddenSinger.setAttribute('value',array[i].singer);
        hiddenTj.setAttribute('value',tjCode);
        hiddenKumyoung.setAttribute('value',kumgoungCode);
        hiddenAction.setAttribute('value','searchModal');
        iconImg.addEventListener('click', ()=> {
            searchResults.submit();
        });
        // for (let i=0; i<modals.length; i++) {
        //     iconImg.addEventListener('click', ()=> {
        //         //modals[i].style.display = "block";
        //         searchResults.submit();
        //     }); 
        // }

        songImgDiv.appendChild(songImg);
        song.appendChild(songText);
        singer.appendChild(singerText);
        code.appendChild(codeText);
        code2.appendChild(code2Text);
        tjBrand.appendChild(tjText);
        kumyoungBrand.appendChild(kumyoungText);
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

        if (array[i].tj_code && array[i].kumyoung_code) {
            brandCodes.appendChild(tjBrand);
            brandCodes.appendChild(code);
            brandCodes.appendChild(kumyoungBrand);
            brandCodes.appendChild(code2);
        } else if (array[i].tj_code) {
            brandCodes.appendChild(tjBrand);
            brandCodes.appendChild(code);
        } else if (array[i].kumyoung_code) {
            brandCodes.appendChild(kumyoungBrand);
            brandCodes.appendChild(code2);
        }

        div_parent.appendChild(searchResults);
    }
}

function notFound() {
    let div_parent = document.querySelector('#searchResults');
    div_parent.innerHTML = "";

    let error = document.createElement('p');
    let errorText = document.createTextNode('Not Found');

    error.setAttribute('class','errorMsg');

    error.appendChild(errorText);
    div_parent.appendChild(error);
}


let modals = document.getElementsByClassName("modalSearch");   
    
let modalDisplay = document.getElementById('modalDisplay');
if(modalDisplay.value === 'on'){
    for (let i=0; i<modals.length; i++) {
        modals[i].style.display = "block"; 
    }
//     entry = document.getElementById("entry");
// }


    // let addPlaylistButton = document.getElementsByClassName('addPlaylist');
