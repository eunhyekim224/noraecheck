<input type="hidden" id="scoreMode"name="scoreOption" value=<?=$scoreOption;?>>
<table id="displayBoard" align="center">
    <thead>
        <tr>
            <th colspan="3">Challenge Scoreboard</th>
        </tr>
    </thead>

        <tbody>
            <tr>
                <td class="singer">Rank</td>
                <td class="singer">Singer</td>
                <td class="score">Score</td>
            </tr>
            
            <?php 
            foreach ($trophy as $rank => $trophy_rank ): ?>
            <tr>
                <td><?=$order=$rank+1?></td>
                <td><?=$trophy_rank['singer']?></td>
                <td><?=$trophy_rank['winner_score']?></td>        
            </tr>
            <?php endforeach ?>
    </tbody>
</table>

<div id="accountBtns">
    <!-- <a href="index.php?action=deleteChallenge" id="playAgain" class="btn"> Play again ?</a> -->
    <button id="challengeAgain" class="btn btnOrange"> Play again ?</button>
    <a href="index.php?action=deleteChallenge" id="createAccount" class="btn btnOrange">Go back to my playlists</a>
</div>

<?php require("newChallenge.php"); ?>