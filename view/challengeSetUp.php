<div id="challengeWrapper">
    <div id="challengeScndWrapper">
        <div id="singerFlex">
            <div id="challengeSingers">
                <label for="singer">Enter the singers</label>
                <div id="singerInput">
                    <input type="text" name="singer" id="singer">
                    <button type="button" id="singerSubmit" value="singerSubmit"></button>
                </div>
                <ul id="listOfSingers">
                    <li data-singer="<?= $_SESSION['username'];?>">
                        <?= $_SESSION['username'];?>
                        <input type="button" id="deleteSinger" name="deleteSinger"/>
                    </li>
                    <?php if ($allSingers && $allSingers !== ''): ?>
                        <li data-singer>
                            <?= $allSingers[$i];?>
                            <input type="button" id="deleteSinger" name="deleteSinger"/>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <form action="index.php" method="post" id="songsAndScoreFlex">
            <input type="hidden" name="action" value="insertChallengeInfo">
            <input type="hidden" name="allSingers" id="allSingers">
            <div id="challengeSongs">
                <h1>Choose songs from...</h1>
                <div id="chalPlaylistOptionsBtns">
                    <input type="radio" checked id="onePlaylist" name="chalOptions" value="onePlaylist">
                    <label for="onePlaylist" class="btn">One Playlist</label>
                    <input type="radio" id="allPlaylists" name="chalOptions" value="allPlaylists">
                    <label for="allPlaylists" class="btn" >All Playlists</label>
                </div>
                <div id="selectPlaylist">
                    <select name="playlists" id="playlists">
                        <?php foreach ($playlists as $playlist): ?>
                            <?php if ($playlist['playlistId'] == $chalPlaylistId): ?> 
                                <option selected value="<?= $playlist['playlistId']; ?>"><?=$playlist['playlistName']; ?></option>
                                <?php else: ?>
                                <option value="<?= $playlist['playlistId']; ?>"><?=$playlist['playlistName']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div id="selectAllSongs">
                    <label for="noOfSongs">How many songs would you like to sing?</label>
                    <?php if ($noOfSongs): ?>
                        <input type="number" name="noOfSongs" id="noOfSongs" min="1" max="50" value=<?= $noOfSongs; ?>>
                        <?php else: ?>
                        <input type="number" name="noOfSongs" id="noOfSongs" min="1" max="50">
                    <?php endif; ?>
                </div>
            </div>
            <div id="scoreOptionWrapper">
                <div>Enter the scores</div>
                <input type="checkbox" name="scoreOption" id="scoreOption">
                <label for="scoreOption"></label>
            </div>
            <div id="startBtn">
                <input type="submit" name="startChalBtn" value="START" class="btn" id="startChalBtn">
            </div>
        </form>
    </div>
</div>
<script src="public/js/challengeSetUp.js"></script>