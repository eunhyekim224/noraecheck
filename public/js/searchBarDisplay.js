let searchOptions = document.getElementById('searchOptions');
let searchOptionIndex = 'song';

let song = document.getElementById('song');
let singer = document.getElementById('singer');
let code = document.getElementById('code');
let entry = document.getElementById('entry');
let submit = document.getElementById('submit');
let category = document.getElementById('category');

function switchOptions(index){
    switch(index){
        case 'song':
            song.style.display="flex";
            song.style.alignItems="center";
            song.style.borderTopLeftRadius="15px";
            song.style.borderBottomLeftRadius="15px";
            singer.style.display="none";
            code.style.display="none";
            entry.style.display="block";
            submit.style.display="block";
            category.value="song";
            break;
        case 'singer':
            song.style.display="none";
            singer.style.display="flex";
            singer.style.alignItems="center";
            singer.style.borderTopLeftRadius="15px";
            singer.style.borderBottomLeftRadius="15px";
            code.style.display="none";
            entry.style.display="block";
            submit.style.display="block";
            category.value="singer";
            break;
        case 'code':
            song.style.display="none";
            singer.style.display="none";
            code.style.display="flex";
            code.style.alignItems="center";
            code.style.borderTopLeftRadius="15px";
            code.style.borderBottomLeftRadius="15px";
            code.style.borderTopRightRadius="0px";
            code.style.borderBottomRightRadius="0px";
            entry.style.display="block";
            submit.style.display="block";
            category.value="code";
            break;
        case 'all':
            song.style.display="flex";
            singer.style.display="flex";
            singer.style.borderTopLeftRadius="0px";
            singer.style.borderBottomLeftRadius="0px";
            code.style.display="flex";
            code.style.borderTopLeftRadius="0px";
            code.style.borderBottomLeftRadius="0px";
            song.style.borderTopLeftRadius="15px";
            song.style.borderBottomLeftRadius="15px";
            code.style.borderTopRightRadius="15px";
            code.style.borderBottomRightRadius="15px";
            entry.style.display="none";
            submit.style.display="none";
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