//Open and close block to change password
// let showChangePwdBtn = document.querySelector('.changePwdBtn');
// let changePwdBlock = document.querySelector('.changePwd');
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

showAndCloseModal(editProfileModal, editProfileBtn, cancelEditButton[0]);
showAndCloseModal(editProfileModal, deleteProfileBtn, cancelEditButton[0]);

function showAndCloseModal(modals, buttons, cancelButtons) {
    showModal(modals, buttons);
    closeModal(modals, cancelButtons);
}

function showModal(modal, button) {
    button.addEventListener('click', ()=> {
        modal.style.display = "block";
    }); 
}

function closeModal (modal, cancelButton) {
    cancelButton.addEventListener('click', ()=> {
        modal.style.display = "none";
        location.reload();  
    });
    window.addEventListener('click', (e)=> {
        if (e.target == modal) {
            modal.style.display = "none";
            location.reload();  
        }
    });      
}