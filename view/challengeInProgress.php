<?php print_r($getChallenge[$round]);?>
<div id="challengeInProgress">
    <div id="challengeUser">
        <span><?=$getChallenge[$round]['player']?></span>
        <p>vs.</p>
    </div> 
    <div id="challengeSong">
        <img src="public/images/album2.png" id="mainPlaylistImg">
        <div id="mainSongInfo">
            <p class="darkGrey playlistNameText"><?=$getChallenge[$round]['song']?></p>
            <p>by <?=$getChallenge[$round]['singer']?></p>
            <div class="">  
            </div>
            <form method="post" action="index.php" class="songListBrands songBrandCodeContainer">
                <input type="hidden" name="action" value="editBrandCode">
                <input type="hidden" name="page" value="challengeInProgress">
                <input type="hidden" name="scoreOption" value=<?=$scoreOpt;?>>
                <input type="hidden" name="oldScore" value=<?=$score?>>
                <input type="hidden" name="round" value= <?=$round?>>
                <input type="hidden" name="songId" value=<?= $getChallenge[$round]['songId'];?>>
                <input type="hidden" name="playlistId" value=<?=$getChallenge[$round]['playlistId']?>>
                <div class="songListBrandCodes challengeCode">
                    <label for="tjCode<?=$getChallenge[$round]['songId']?>">TJ</label>
                    <input type="text" name="tjCode" maxlength=10 id="tjCode<?=$getChallenge[$round]['songId']?>" autocomplete="off" value=<?=$getChallenge[$round]['tj']?> >
                </div>
                <div class="songListBrandCodes challengeCode">
                    <label for="kumyoungCode<?=$getChallenge[$round]['songId']?>">KY</label>
                    <input type="text" name="kumyoungCode" maxlength=10 id="kumyoungCode<?=$getChallenge[$round]['songId']?>" autocomplete="off" value=<?=$getChallenge[$round]['kumyoung']?> >
                </div>
            </form>
        </div>
        <form id="scoreEnterDiv" action="index.php">
            <img src='public/images/plusIcon4.png' class = 'addScoreImg'/>
            <p class="yourScoreText hidden">your score :</p>
            <p class="addScoreText">add score</p>
            <input type="text" name="newScore" maxlength=10 id="newScore" autocomplete="off"class="hidden" value="" >
            <input type="button" id="enterScore" value="enter" class="enterScore hidden">
            <p class="addScoreText hidden"></p>
            <input type="hidden" name="songIdToUpdate"id="songIdToUpdate" value="<?=$getChallenge[$round]['songId']?>">
            <input type="hidden" name="round" id="round2" value= <?=$round?>>
            <p name="oldScore" id="oldScore" class="hidden"><?=$score?></p>
            <input type="hidden" name="action" value="updateScore">
            <input type="button" id="reEnter" value="re-enter" class="enterScore hidden">
            <input type="hidden" name="scoreOption" value=<?=$scoreOpt;?>>
        </form>
    </div> 
    <form method="post" id="challengeRoundForm" action="index.php">
        <input type="hidden" name="action" value="challengeInProgress">
        <input type="hidden" id="numberOfRounds" value=<?=count($getChallenge);?>>
        <input type="hidden" name="round" id="round" value= <?=$round?>>
        <input type="hidden" id="scoreMode"name="scoreOption" value=<?=$scoreOpt;?>>
        <div id="challengeBtns">
            <input type="button" name="addToPlaylist" id="exit" value="exit" class="btn btnBlue">
            <input type="button" name="cancel" id="nextRound" value="next" class="btn btnBlue">
        </div>     
    </form>
    <?php include("challengeExitModal.php");?>
    <script src="./public/js/challengeInProgress.js"></script>
    <script src="./public/js/editBrandCode.js"></script>
</div>