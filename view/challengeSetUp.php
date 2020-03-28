<div id="challengeWrapper">
    <div id="challengeScndWrapper">
        <div id="singerFlex">
            <div id="challengeSingers">
                <label for="singer">Enter the singers</label>
                <div id="singerInput">
                    <input type="text" name="singer" id="singer">
                    <button type="button" id="singerSubmit" value="singerSubmit">enter</button>
                </div>
                <ul id="listOfSingers"></ul>
            </div>
        </div>
        <form action="index.php" method="post" id="songsAndScoreFlex">
            <input type="hidden" name="action" value="insertChallengeInfo">
            <input type="hidden" name="allSingers" id="allSingers">
            <div id="challengeSongs">
                <h1>Choose songs from...</h1>
                <div id="chalPlaylistOptionsBtns">
                    <input type="radio" id="onePlaylist" name="chalOptions" value="onePlaylist">
                    <label for="onePlaylist" class="btn btnBlue">One Playlist</label>
                    <input type="radio" id="allPlaylists" name="chalOptions" value="allPlaylists">
                    <label for="allPlaylists" class="btn btnBlue" >All Playlists</label>
                </div>
                <div id="selectPlaylist">
                    <select name="playlists" id="playlists">
                        <option>Select a playlist...</option>
                        <?php while ($playlist = $playlists->fetch()) {; ?>
                            <option value="<?= $playlist['playlistId']; ?>"><?=$playlist['playlistName']; ?></option>
                        <?php }; ?>
                    </select>
                </div>
                <div id="selectAllSongs">
                    <label for="noOfSongs">How many songs would you like to sing?</label>
                    <input type="number" name="noOfSongs" id="noOfSongs" min="1" max="50">
                </div>
            </div>
            <div id="scoreOptionWrapper">
                <label for="scoreOption">Enter the scores</label>
                <input type="checkbox" name="scoreOption" id="scoreOption">
            </div>
            <div id="startBtn">
                <input type="submit" name="startChalBtn" value="START" class="btn" id="startChalBtn">
            </div>
        </form>
    </div>
</div>
<script src="public/js/challengeSetUp.js"></script>