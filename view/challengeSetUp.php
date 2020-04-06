<?php $allSingers = isset($_SESSION['allSingers']) ? $_SESSION['allSingers'] : ''; ?>
<?php $chalPlaylistOptions = isset($_SESSION['chalPlaylistOptions']) ? $_SESSION['chalPlaylistOptions'] : ''; ?>
<?php $chalPlaylistId = isset($_SESSION['chalPlaylistId']) ? $_SESSION['chalPlaylistId'] : ''; ?>
<?php $noOfSongs = isset($_SESSION['noOfSongs']) ? $_SESSION['noOfSongs'] : ''; ?>
<?php $scoreOption = isset( $_SESSION['scoreOption']) ? $_SESSION['scoreOption'] : ''; ?>



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
                        <?php for($i=1, $c=count($allSingers); $i<$c; $i++): ?>
                            <li>
                                <?= $allSingers[$i];?>
                                <input type="button" id="deleteSinger" name="deleteSinger"/>
                            </li>
                        <?php endfor; ?>
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
                    <?php if ($chalPlaylistOptions == 'onePlaylist'): ?>
                        <input type="radio" checked id="onePlaylist" name="chalOptions" value="onePlaylist">
                        <label for="onePlaylist" class="btn">One Playlist</label>
                        <input type="radio" id="allPlaylists" name="chalOptions" value="allPlaylists">
                        <label for="allPlaylists" class="btn" >All Playlists</label>
                        <?php elseif ($chalPlaylistOptions == 'allPlaylists'): ?> 
                        <input type="radio" id="onePlaylist" name="chalOptions" value="onePlaylist">
                        <label for="onePlaylist" class="btn">One Playlist</label>
                        <input type="radio" checked id="allPlaylists" name="chalOptions" value="allPlaylists">
                        <label for="allPlaylists" class="btn" >All Playlists</label> 
                        <?php else: ?>
                        <input type="radio" checked id="onePlaylist" name="chalOptions" value="onePlaylist">
                        <label for="onePlaylist" class="btn">One Playlist</label>
                        <input type="radio" id="allPlaylists" name="chalOptions" value="allPlaylists">
                        <label for="allPlaylists" class="btn" >All Playlists</label>
                    <?php endif; ?>
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
                <label for="scoreOption">Enter the scores</label>
                <?php if ($scoreOption === 'on'): ?>
                    <input type="checkbox" checked name="scoreOption" id="scoreOption">
                    <?php else: ?>
                    <input type="checkbox" name="scoreOption" id="scoreOption">
                <?php endif; ?>
            </div>
            <div id="startBtn">
                <input type="submit" name="startChalBtn" value="START" class="btn" id="startChalBtn">
            </div>
        </form>
    </div>
</div>
<script src="public/js/challengeSetUp.js"></script>