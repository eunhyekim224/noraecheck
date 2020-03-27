<div id="challengeWrapper">
    <form action="index.php" method="post">
        <div id="challengeSingers">
            <label for="singer">Enter the singers</label>
            <input type="text" name="singer" id="singer">
            <div id="listOfSingers"></div>
        </div>
        <div id="challengeSongs">
            <h1>Choose songs from...</h1>
            <div id="chalPlaylistOptionsBtns">
                <button type="button" id="onePlaylist" class="btn btnBlue" value="onePlaylist">One Playlist</button>
                <button type="button" id="allPlaylists" class="btn btnBlue" value="allPlaylist">All Playlists</button>
            </div>
            <div id="selectPlaylist">
                <select id="playlists">
                    <option name="playlist" value="Select a playlist..."></option>
                    <?php while ($playlist = $playlists->fetch()) {; ?>
                        <option name="playlist" value="<?= $playlist['playlistId']; ?>"><?=$playlist['playlistName']; ?></option>
                    <?php }; ?>
                </select>
            </div>
            <div id="selectAllSongs">
                <label for="noOfSongs">How many songs would you like to sing?</label>
                <input type="number" name="noOfSongs" id="noOfSongs" min="1" max="50">
            </div>
        </div>
        <div id="scoreOptionWrapper">
            <label for="scoreOption">I want to enter the scores</label>
            <input type="checkbox" name="scoreOption" id="scoreOption">
        </div>
    </form>
</div>
<script src="public/js/challengeSetUp.js"></script>