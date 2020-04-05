// use JS make the play again button pop up with "NEW CHALLENGE"
const btnAgain = document.getElementById('challengeAgain');
const modalAgain = document.getElementById('modalAgain');
const btnCancel = document.getElementById('cancelBtn');
const displayBoard = document.getElementById('displayBoard');
let scoreMode = document.getElementById('scoreMode').value;


if(!scoreMode){
    displayBoard.classList.add('hidden');
}

btnAgain.onclick = function() {
    modalAgain.style.display = "block";
}

btnCancel.onclick = function() {
    modalAgain.style.display = "none";
}

// repeat challenge


