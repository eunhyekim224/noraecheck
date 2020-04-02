let roundNumber = document.getElementById("round");
const nextButton = document.getElementById("nextRound");
const numOfRounds = parseInt(document.getElementById("numberOfRounds").value);
const challengeRoundForm = document.getElementById("challengeRoundForm");
const action = document.getElementsByName('action')[2];
const exit = document.getElementById('exit');
let scoreMode = document.getElementById('scoreMode').value;

const changeScoreDiv = document.getElementById('scoreEnterDiv');

console.log(numOfRounds);

//don't display add score button if hidden
if(!scoreMode){
    changeScoreDiv.classList.add('hidden');
}




//go to next round
nextButton.addEventListener('click', function() {
    roundNumber.setAttribute('value', (parseInt(roundNumber.value) + 1));
    if (parseInt(roundNumber.value) === numOfRounds) {
        action.setAttribute('value', 'endChallenge');
    }
    challengeRoundForm.submit();

})

//click exit and open the modal
const modal = document.getElementById('exitModal');

exit.addEventListener('click', function(e) {
    e.stopPropagation();
    modal.classList.add('shown');

})


//click cancel or anywhere outside the modal to remove the modal
const cancel = document.getElementsByName('cancel')[0];

cancel.addEventListener('click', function() {
    modal.classList.remove('shown');

})

document.body.addEventListener('click', function() {
    modal.classList.remove('shown');
})



//exit the game
const finalExit = document.getElementsByName('exit')[0];

finalExit.addEventListener('click', function() {
    //also change this to the final page once it is created
    action.setAttribute('value', 'endChallenge');
    challengeRoundForm.submit();

})


//change form on click




//view1
const bigPlus = document.getElementById('scoreEnterDiv').childNodes[1];
const addScoreText = document.getElementById('scoreEnterDiv').childNodes[5];

// view2
const yourScoreText = document.getElementById('scoreEnterDiv').childNodes[3];
const yourScoreInput = document.getElementById('scoreEnterDiv').childNodes[7];
const scoreEnterButton = document.getElementById('scoreEnterDiv').childNodes[9];

//view 3
const oldScore = document.getElementById('oldScore');
const reEnter = document.getElementById('reEnter');
const yourScore = document.getElementById('yourScore');

if (oldScore.innerText) {
    bigPlus.classList.add('hidden');
    addScoreText.classList.add('hidden');

    yourScoreText.classList.remove('hidden');
    oldScore.classList.remove("hidden");
    reEnter.classList.remove("hidden");
}
changeScoreDiv.addEventListener('click', function() {
    bigPlus.classList.add('hidden');
    addScoreText.classList.add('hidden');


    yourScoreText.classList.remove('hidden');
    yourScoreInput.classList.remove('hidden');
    scoreEnterButton.classList.remove('hidden');
    yourScoreInput.focus();


    scoreEnterButton.addEventListener('click', function(e) {
        e.stopPropagation();

        changeScoreDiv.submit();

    })

})

changeScoreDiv.addEventListener('click', function() {
    oldScore.classList.add('hidden');
    reEnter.classList.add('hidden');

    yourScoreInput.classList.remove('hidden');
    scoreEnterButton.classList.remove('hidden');


    scoreEnterButton.addEventListener('click', function(e) {
        e.stopPropagation();

        changeScoreDiv.submit();

    })

})