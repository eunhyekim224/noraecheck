let searchBox = document.getElementById('search');
let container = document.getElementById('resultsContainer');
//grab elements for the textbox and the div that will ultimately host the results


let resultCounter = -1;//this counter will keep track of the selected value for the arrow keys.

searchBox.addEventListener('keyup',function(e){
    var inputValue = e.target.value;//select the text in the textbox
    
    // run ajax request to backend w the contents of the text box
    var xhr = new XMLHttpRequest();
    xhr.open('GET', `http://localhost/Sites/autocorrect/api.php?inputValue=${inputValue}`);

    xhr.addEventListener('readystatechange', function(){ 
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) { 
            
            //split the returned string into an array and get rid of the last |
            let searchResult = xhr.response.split("|");
            searchResult.pop();

            //if there are search result divs from a previous search then kill them
            for (let j = 0, d = container.childNodes.length; j < d; j++){
                container.removeChild(container.childNodes[0]);
            }

            //take the results from the currents seach and put them in new div elements
            //put those div elements in the aforementioned container
            for(let i = 0,c = searchResult.length;i < c;i++){
                var newLink = document.createElement('div');
                newLink.className = "result";
                newLinkText = document.createTextNode(searchResult[i]);

                newLink.appendChild(newLinkText);
                container.appendChild(newLink);

            }
            //select all the children made by the previous loop
            let children = document.getElementsByClassName("result");
            
            //hit the down arrow, selection moves down hit up arrow selection moves up
            //hit enter then textbox input is that value and kill the children
            //these conditionals apply to the counter variable listed above
            if(e.keyCode === 40){
                resultCounter += 1;
            } else if (e.keyCode === 38){
                resultCounter--;
            } else if (e.keyCode ===13){
                e.target.value=children[resultCounter].textContent;
                for (let j = 0, d = container.childNodes.length; j < d; j++){
                    container.removeChild(container.childNodes[0]);
                }
            }else {
                resultCounter = 0;
            }
            for (k=0;k<children.length;k++){
                //this conditional applies the selection counter and makes it select
                if (k === resultCounter){
                    children[k].style.backgroundColor="thistle";
                }
                //if person clicks on a search result then do the same shit as enter
                children[k].addEventListener('click',function(){
                    e.target.value=this.textContent;
                    for (let j = 0, d = container.childNodes.length; j < d; j++){
                        container.removeChild(container.childNodes[0]);
                    }
                })
            }

            
        } else if (xhr.readyState === XMLHttpRequest.DONE && xhr.status !== 200 & xhr.status === 0){

            alert('there was an error \n\n Code:' + xhr.status + '\nText : ' + xhr.statusText);
            //just in case
        }

    });
    xhr.send(null);

});








