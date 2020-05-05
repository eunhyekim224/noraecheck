let searchOptions = document.getElementById('searchOptions');
let searchOptionIndex = 'title';

let song = document.getElementById('title');
let singer = document.getElementById('artist');
let no = document.getElementById('id');
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
        case 'title':
            singer.classList.add("hidden");
            no.classList.add("hidden");
            searchOptions.classList.remove('searchOptionsExpanded');
            category.value = "title";
            entry.classList.remove("compactEntry");
            break;
        case 'artist':
            singer.classList.remove("hidden");
            song.classList.add("hidden");
            no.classList.add("hidden");
            entry.classList.remove("compactEntry");
            searchOptions.classList.remove('searchOptionsExpanded');
            category.value = "artist";

            break;
        case 'id':
            song.classList.add("hidden");
            singer.classList.add("hidden");
            entry.classList.remove("compactEntry");
            searchOptions.classList.remove('searchOptionsExpanded');
            category.value = "id";


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
                case 'title':
                    song.classList.add("searchOptionSelected");
                    break;

                case 'artist':
                    singer.classList.add("searchOptionSelected");
                    break;
                case 'id':
                    no.classList.add("searchOptionSelected");
                    break;
            }

            break;
    }
}

function switchOptions(index) {

    switch (index) {
        case 'title':
            category.value = "title";
            break;
        case 'artist':
            category.value = "artist";
            break;
        case 'id':
            category.value = "id";
            break;
    }

}

song.addEventListener('click', function() {
    if (searchOptionIndex === 'title') {
        searchOptionIndex = 'all';
    } else {
        searchOptionIndex = 'title';
        entry.focus();
    }
    switchOptions(searchOptionIndex);
    switchOptionsDisplay(searchOptionIndex);
});
singer.addEventListener('click', function() {
    if (searchOptionIndex === 'artist') {
        searchOptionIndex = 'all';
    } else {
        searchOptionIndex = 'artist';
        entry.focus();
    }
    switchOptions(searchOptionIndex);
    switchOptionsDisplay(searchOptionIndex);
    autocorrect(entry.value, category.value);
});
no.addEventListener('click', function() {
    if (searchOptionIndex === 'id') {
        searchOptionIndex = 'all';
    } else {
        searchOptionIndex = 'id';
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