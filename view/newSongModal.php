<div class="modalSearch gothamPro">
    <div class="modalContentSearch">
        <form method="post" action="index.php">
            <div id= 'searchNewPlaylist'>
                <input type="text" name="playlistName" class = "playlistName"id="playlistName" size="30" maxlength="50"/>
            </div>
            <input type="hidden" name="action"id="modalFormAction" value="addToPlaylist">
            <label for="playlistId"><span>add song to playlist</span></label>
            <div id="playlistId">
                <?php while ($playlist = $playlistsAdd->fetch()) { 
                    if ($playlist['playlistId'] === $playlistId) {
                        echo '<input checked type="radio" name="playlistId" id="' .$playlist['playlistId']  .'" value="' .$playlist['playlistId'] .'"/><label class="playlists" for="' .$playlist['playlistId']  .'">'.$playlist['playlistName'] .'</label>';
                    } else {
                        echo '<input type="radio" name="playlistId" id="' .$playlist['playlistId']  .'" value="' .$playlist['playlistId'] .'"/><label class="playlists" for="' .$playlist['playlistId']  .'">'.$playlist['playlistName'] .'</label>';
                    }
                }?>
            </div>
            <div class="modalButtons openSans addSongToNewPlaylistButton">
                <div name="newPlaylist" class="addPlaylistSearchBtn">new playlist</div>             
            </div>
            <input type="hidden" name="song" value=<?=urlencode($song);?>>
            <input type="hidden" name="singer" value=<?=urlencode($singer);?>>
            <input type="hidden" name="tj" value=<?=$tj;?>>
            <input type="hidden" name="kumyoung" value=<?=$kumyoung;?>>
            <div class="modalButtons openSans">
                <input type="submit" name="addToPlaylist" value="add" class="btn btnBlue">
                <input type="button" name="cancel" value="Cancel" class="btn btnBlue">               
            </div>
        </form>
    </div>
</div>