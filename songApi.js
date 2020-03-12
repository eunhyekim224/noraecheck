function loadFile(entry,category){//function takes inputs from these two variables
    var xhr = new XMLHttpRequest();



   
    xhr.open('GET', `https://api.manana.kr/karaoke/${category}/${entry}.json`);

    xhr.addEventListener('readystatechange', function(){ //manage an asynchronous request in this function
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) { //if the file is loaded without error
            
            obj = JSON.parse(xhr.response);
            console.log(obj);
            let searchResults = document.getElementById('searchResultsDiv');
            searchResults.innerHTML ='';
            


            for (let i = 0,c = obj.length; i < c; i++){
                let searchResult = document.createElement('div');
                if(obj[i].brand === 'tj' ||obj[i].brand === 'kumyoung'){
                    searchResult.title = `search result ${i}`;
                
                    let singerResult = document.createElement('span');
                    let singerResultText = document.createTextNode(obj[i].singer + ' || ');
                    let songResult = document.createElement('span');
                    let songResultText = document.createTextNode(obj[i].title  + ' || ');
                    let numResult = document.createElement('span');
                    let numResultText = document.createTextNode(obj[i].no  + ' || ');
                    let brandResult = document.createElement('span');
                    let brandResultText = document.createTextNode(obj[i].brand);

                    singerResult.appendChild(singerResultText);
                    songResult.appendChild(songResultText);
                    numResult.appendChild(numResultText);
                    brandResult.appendChild(brandResultText);

                    searchResult.appendChild(singerResult);
                    searchResult.appendChild(songResult);
                    searchResult.appendChild(numResult);
                    searchResult.appendChild(brandResult);


                    searchResults.appendChild(searchResult);
                }
        
            }

            
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
            console.log(input.value);
            console.log(categories.value);
            //run the function
            loadFile(input.value,categories.value);
          
            
        });


})();