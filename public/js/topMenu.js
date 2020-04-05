let topMenuDropDown = document.getElementById('topMenuDropDown');
let user = document.getElementById('user');

user.addEventListener('click', function(e) {
    e.stopPropagation();
    if (topMenuDropDown.classList.contains("shown")) {
        topMenuDropDown.classList.remove('shown');
        topMenuDropDown.classList.add('hidden');
    } else {
        topMenuDropDown.classList.remove('hidden');
        topMenuDropDown.classList.add('shown');
    }
    // topMenuDropDown.classList.remove('hidden');
    // topMenuDropDown.classList.add('shown');
})

document.body.addEventListener('click', function() {
    topMenuDropDown.classList.remove('shown');
    topMenuDropDown.classList.add('hidden');
})