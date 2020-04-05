<?php $allSingers = isset($_SESSION['allSingers']) ? $_SESSION['allSingers'] : ''; ?>

<div id="modalAgain" class="modal">
    <div class="modalContentEnd" id="modalContent">    
        <div>
            <a href="index.php?action=newChallenge" title="new challenge" alt="new challenge">
                <input type="button" id="newChallenge" class="btnEnd btnBlue" value="New Challenge?"/>
            </a>
            <a href="index.php?action=repeatChallenge" title="repeat challenge" alt="repeat challenge">
                <input type="button" class="btnEnd btnBlue" name="repeatChallenge" id="repeatChallenge" value="Repeat Challenge" />
            </a>
        </div>
        <div>
            <input type="button" id="cancelBtn" class="btnEnd btnOrange" value="Cancel"/>
        </div>
    </div>
</div>
<script src="./public/js/endChallenge.js"></script>