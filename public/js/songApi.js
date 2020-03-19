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
                    let nameAndTitle = obj[i].singer + obj[i].title;
                    nameAndTitle = nameAndTitle.toLowerCase().replace(/ /g,'');
                    tjCodeMap.set(nameAndTitle,obj[i].no);
                }else if(obj[i].brand === 'kumyoung'){
                    let nameAndTitle = obj[i].singer + obj[i].title;
                    nameAndTitle = nameAndTitle.toLowerCase().replace(/ /g,'');
                    kumyoungCodeMap.set(nameAndTitle,obj[i].no);
                }
        
            }
            for (let i = 0,c = obj.length; i < c; i++) {
                if (obj[i].brand === 'tj' || obj[i].brand === 'kumyoung') {
                    let songKey = obj[i].singer + obj[i].title;
                    songKey = songKey.toLowerCase().replace(/ /g,'');
                    // let titleRegex = obj[i].title.match(/\w+[^\(\w+\)]/gi);
                    let titleRegex = obj[i].title.match(/\w+(?!\(\w+\))/gi);
                    console.log(titleRegex);
                    // console.log(songKey);
                    // let arrayTj = Array.from(tjCodeMap.keys());
                    // let arrayKY = Array.from(kumyoungCodeMap.keys());
                    // let arrayTjItem = arrayTj[0];
                    // let patt = new RegEx(`${arrayKY[1]}`);
                    // console.log(arrayTj);
                    // console.log(arrayKY);

                    // if (patt.test(arrayTjItem)) {
                    //     console.log('true');
                    // }
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
            displayResults(arrayToReturnSliced);
            
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

    // submit.addEventListener('click', function() {
    //     loadFile(input.value,categories.value);   
    // });

    input.addEventListener('keyup', function() {
        if (input.value) {
            loadFile(input.value,categories.value);
        }
    });

})();

function displayResults(array) {
    let modals = document.getElementsByClassName("modal");
    
    
    let div_parent = document.querySelector('#searchResults');
    div_parent.innerHTML = "";

    for (let i=0,c=array.length; i<c; i++) {
        let searchResults = document.createElement('div');
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
        for (let i=0; i<modals.length; i++) {
            iconImg.addEventListener('click', ()=> {
                modals[i].style.display = "block";
            }); 
        }

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


    // let addPlaylistButton = document.getElementsByClassName('addPlaylist');
