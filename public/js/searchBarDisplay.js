let searchOptions = document.getElementById('searchOptions');
let searchOptionIndex = 'song';

let song = document.getElementById('song');
let singer = document.getElementById('singer');
let code = document.getElementById('no');


function switchOptions(index){
    let entry = document.getElementById('entry');
    let category = document.getElementById('category');

    song.classList.remove("searchOptionExpanded");
    singer.classList.remove("searchOptionExpanded");
    code.classList.remove("searchOptionExpanded");
    song.classList.remove("searchOptionSelected");
    singer.classList.remove("searchOptionSelected");
    code.classList.remove("searchOptionSelected");

    switch(index){
        case 'song':
            singer.classList.add("hidden");
            code.classList.add("hidden");
            searchOptions.classList.remove('searchOptionsExpanded');
            category.value="song";
            entry.classList.remove("compactEntry");
            break;
        case 'singer':
            singer.classList.remove("hidden");
            song.classList.add("hidden");
            code.classList.add("hidden");
            entry.classList.remove("compactEntry");
            searchOptions.classList.remove('searchOptionsExpanded');

            category.value="singer";
           
            break;
        case 'code':
            song.classList.add("hidden");
            singer.classList.add("hidden");
            
            entry.classList.remove("compactEntry");
            searchOptions.classList.remove('searchOptionsExpanded');

            category.value="code";
           
            
            break;
        case 'all':
            // everything is displayed
            singer.classList.remove("hidden");
            code.classList.remove("hidden");
            song.classList.remove("hidden");
            // set the expanded style
            song.classList.add("searchOptionExpanded");
            singer.classList.add("searchOptionExpanded");
            code.classList.add("searchOptionExpanded");

            searchOptions.classList.add('searchOptionsExpanded');
            entry.classList.add("compactEntry");
            switch (category.value){
                case 'song':
                    song.classList.add("searchOptionSelected");
                    break;

                case 'singer':
                    singer.classList.add("searchOptionSelected");
                     break;
                case 'code':
                    code.classList.add("searchOptionSelected");
                    break;
            }

            break;
    }
}



song.addEventListener('click',function(){
    if (searchOptionIndex === 'song'){
        searchOptionIndex = 'all';
    } else {
        searchOptionIndex = 'song';
    }
    switchOptions(searchOptionIndex);
});
singer.addEventListener('click',function(){
    if (searchOptionIndex === 'singer'){
        searchOptionIndex = 'all';
    } else {
        searchOptionIndex = 'singer';
    }
    switchOptions(searchOptionIndex);
});
code.addEventListener('click',function(){
    if (searchOptionIndex === 'code'){
        searchOptionIndex = 'all';
    } else {
        searchOptionIndex = 'code';
    }
    switchOptions(searchOptionIndex);
});