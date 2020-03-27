let topMenuDropDown = document.getElementById('topMenuDropDown');
let user = document.getElementById('user');

user.addEventListener('click',function(e){
    e.stopPropagation();
    topMenuDropDown.classList.remove('hidden');
    topMenuDropDown.classList.add('shown');
})

document.body.addEventListener('click',function(){
    topMenuDropDown.classList.remove('shown');
    topMenuDropDown.classList.add('hidden');
})


