<table>
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
    <a href="index.php?action=deleteChallenge" id="backPlaylist" class="btn btnOrange">Go back to my playlists</a>
</div>

<!-- <div class="modalButtons" id="mainOptions"> -->
    <?php require("newChallenge.php"); ?>
<!-- </div> -->