<div id="challengeWrapper">
    <div id="challengeSingers">
        <form action="index.php" method="post">
            <label for="singer">Enter the singers</label>
            <input type="text" name="singer" id="singer">
        </form>
        <div id="listOfSingers">
        </div>
    </div>
    <div id="challengeSongs">
        <form action="index.php" method="post">
            <label for="playlists">Select the playlists</label>
            <select id="playlists">
            <?php while ($playlist = $playlists->fetch()) {; ?>
                <option name="playlist" value="<?= $playlist['playlistId']; ?>"><?=$playlist['playlistName']; ?></option>
            <?php }; ?>
            </select>
            <div>OR</div>
            <input type="number" name="noOfSongs" id="noOfSongs" min="1" max="50">songs from all my playlist
        </form>
        <div id="listOfSingers">
        </div>
    </div>
</div>
