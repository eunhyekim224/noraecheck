//Open and close div to change password

let showChangePwdBtn = document.getElementById('changePwdBtn');
let changePwdBlock = document.getElementById('changePwd');

showChangePwdBtn.addEventListener('click', () => {
    if (changePwdBlock.style.visibility === "visible") {
        changePwdBlock.style.visibility = "hidden";
    } else {
        changePwdBlock.style.visibility = "visible";
    }
});

//Open and close modal to edit profile

let deleteProfileBtn = document.querySelector('#deleteProfileBtn');
let editProfileBtn = document.querySelector('#editProfileBtn');
let editProfileModal = document.querySelector('.modal');
let cancelEditButton = document.getElementsByName("cancelEdit");
let editProfileForm = document.querySelector('#editProfileForm');


editProfileBtn.addEventListener('click', ()=>{
    editProfileModal.style.display = "block";
});

deleteProfileBtn.addEventListener('click', ()=>{
    editProfileModal.style.display = "block";
});


function setDisplayModals(elt) {
    elt.addEventListener("click", function(e) {
        const editProfileMod = document.querySelector('.modal');
        if (e.target == cancelEditButton[0] || e.target == editProfileModal) {
            hideModal(editProfileMod);
            errors = document.querySelector(" .modal div .error");
            errors.style.display = "none";
            // errors = document.querySelectorAll("div .error");
            // for (let i = 0; i < errors.length; i++) {
            //     errors[i].style.display = "none";
            // }
        }
    });
}

function hideModal(elt) {
    elt.style.display = "none";
}

function editProfileVerify(editProfileForm, e) {
    if (editProfileForm.querySelector('#newUsername').value && editProfileForm.querySelector('#oldPwd').value) {
        editProfileForm.submit();
    } else {
        e.preventDefault();
        error = editProfileForm.querySelector("div .error");
        error.style.display = "block";
    }
}

/********EXECUTION******* */

{
    function init() {
        setDisplayModals(window);
        let cancelEditButton = document.getElementsByName("cancelEdit");
        // closeModals = document.querySelectorAll("span.close");
        // for (let i = 0; i < closeModals.length; i++) {
        setDisplayModals(cancelEditButton[0]);
        // }

        const submitEdit = document.querySelector('.editProfileBtns input[name=edit]');
        submitEdit.addEventListener("click", function(e) {
            editProfileVerify(document.querySelector('#editProfileForm'), e);
        });
        // for the button to the creation
    }
    init();
}