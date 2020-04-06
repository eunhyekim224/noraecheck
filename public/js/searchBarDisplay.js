let searchOptions = document.getElementById('searchOptions');
let searchOptionIndex = 'song';

let song = document.getElementById('song');
let singer = document.getElementById('singer');
let no = document.getElementById('no');
let entry = document.getElementById('entry');
let category = document.getElementById('category');

function switchOptionsDisplay(index) {

    song.classList.remove("searchOptionExpanded");
    singer.classList.remove("searchOptionExpanded");
    no.classList.remove("searchOptionExpanded");
    song.classList.remove("searchOptionSelected");
    singer.classList.remove("searchOptionSelected");
    no.classList.remove("searchOptionSelected");

    switch (index) {
        case 'song':
            singer.classList.add("hidden");
            no.classList.add("hidden");
            searchOptions.classList.remove('searchOptionsExpanded');
            category.value = "song";
            entry.classList.remove("compactEntry");
            break;
        case 'singer':
            singer.classList.remove("hidden");
            song.classList.add("hidden");
            no.classList.add("hidden");
            entry.classList.remove("compactEntry");
            searchOptions.classList.remove('searchOptionsExpanded');
            category.value = "singer";

            break;
        case 'no':
            song.classList.add("hidden");
            singer.classList.add("hidden");
            entry.classList.remove("compactEntry");
            searchOptions.classList.remove('searchOptionsExpanded');
            category.value = "no";


            break;
        case 'all':
            // everything is displayed
            singer.classList.remove("hidden");
            no.classList.remove("hidden");
            song.classList.remove("hidden");
            // set the expanded style
            song.classList.add("searchOptionExpanded");
            singer.classList.add("searchOptionExpanded");
            no.classList.add("searchOptionExpanded");

            searchOptions.classList.add('searchOptionsExpanded');
            entry.classList.add("compactEntry");
            switch (category.value) {
                case 'song':
                    song.classList.add("searchOptionSelected");
                    break;

                case 'singer':
                    singer.classList.add("searchOptionSelected");
                    break;
                case 'no':
                    no.classList.add("searchOptionSelected");
                    break;
            }

            break;
    }
}

function switchOptions(index) {

    switch (index) {
        case 'song':
            category.value = "song";
            break;
        case 'singer':
            category.value = "singer";
            break;
        case 'no':
            category.value = "no";
            break;
    }

}

song.addEventListener('click', function() {
    if (searchOptionIndex === 'song') {
        searchOptionIndex = 'all';
    } else {
        searchOptionIndex = 'song';
        entry.focus();
    }
    switchOptions(searchOptionIndex);
    switchOptionsDisplay(searchOptionIndex);
});
singer.addEventListener('click', function() {
    if (searchOptionIndex === 'singer') {
        searchOptionIndex = 'all';
    } else {
        searchOptionIndex = 'singer';
        entry.focus();
    }
    switchOptions(searchOptionIndex);
    switchOptionsDisplay(searchOptionIndex);
    autocorrect(entry.value, category.value);
});
no.addEventListener('click', function() {
    if (searchOptionIndex === 'no') {
        searchOptionIndex = 'all';
    } else {
        searchOptionIndex = 'no';
        entry.focus();
    }
    switchOptions(searchOptionIndex);
    switchOptionsDisplay(searchOptionIndex);
    autocorrect(entry.value, category.value);

});
entry.addEventListener('click', function() {
    if (searchOptionIndex === 'all') {
        searchOptionIndex = category.value;
        switchOptionsDisplay(searchOptionIndex);
        autocorrect(entry.value, category.value);

    }
})