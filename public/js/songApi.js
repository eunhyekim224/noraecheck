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
            for (let i = 0,c = obj.length; i < c; i++){
                let songKey = obj[i].singer + obj[i].title;
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

            console.log(arrayToReturn);
            let json = JSON.stringify(arrayToReturn);
            return json;
            


            
        } else if (xhr.readyState === XMLHttpRequest.DONE && xhr.status !== 200 & xhr.status === 0){

            alert('there was an error \n\n Code:' + xhr.status + '\nText : ' + xhr.statusText);
            
        }

    });
    xhr.send(null);
}

(function(){
    var submit = document.getElementById('submit');
    var categories = document.getElementById('categories');
    let input = document.getElementById('searchedWords');

    submit.addEventListener('click', function(){

            loadFile(input.value,categories.value);
          
            
        });


})();




// for (let i = 0,c = obj.length; i < c; i++){
//     let searchResult = document.createElement('div');
//     if(obj[i].brand === 'tj' ||obj[i].brand === 'kumyoung'){
//         searchResult.title = `search result ${i}`;
    
//         let singerResult = document.createElement('span');
//         let singerResultText = document.createTextNode(obj[i].singer + ' || ');
//         let songResult = document.createElement('span');
//         let songResultText = document.createTextNode(obj[i].title  + ' || ');
//         let numResult = document.createElement('span');
//         let numResultText = document.createTextNode(obj[i].no  + ' || ');
//         let brandResult = document.createElement('span');
//         let brandResultText = document.createTextNode(obj[i].brand);

//         singerResult.appendChild(singerResultText);
//         songResult.appendChild(songResultText);
//         numResult.appendChild(numResultText);
//         brandResult.appendChild(brandResultText);

//         searchResult.appendChild(singerResult);
//         searchResult.appendChild(songResult);
//         searchResult.appendChild(numResult);
//         searchResult.appendChild(brandResult);


//         searchResults.appendChild(searchResult);
//     }

//}