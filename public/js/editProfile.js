    //Open and close block to change password
    let showChangePwdBtn = document.querySelector('.changePwdBtn');
    let changePwdBlock = document.querySelector('.changePwd');

    showChangePwdBtn.addEventListener('click', () => {
        if (changePwdBlock.style.visibility === "hidden") {
            changePwdBlock.style.visibility = "visible";
        } else {
            changePwdBlock.style.visibility = "hidden";
        }
    });

//Open and close modal to delete profile

let deleteProfileBtn = document.querySelector('#deleteProfileBtn');
let deleteProfileModal = document.querySelector('.modal');
let cancelDelButton = document.getElementsByName("cancelDel");

showAndCloseModal(deleteProfileModal, deleteProfileBtn, cancelDelButton[0]);

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