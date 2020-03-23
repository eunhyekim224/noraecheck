<div class="modalSearch gothamPro">
    <div class="modalContentSearch">
        <!-- <p>add song to playlist</p> -->
        
        <form method="post" action="index.php" id="searchNewPlaylist">
            <input type="text" name="playlistName" class = "playlistName"id="playlistName" size="30" maxlength="50" required/>
            <input type="hidden" name="action" value="addSongToNewPlaylist">
            <input type="hidden" name="song" value=<?=urlencode($song); ?>>
            <input type="hidden" name="singer" value=<?=urlencode($singer); ?>>
            <input type="hidden" name="tj" value=<?=$tj; ?>>
            <input type="hidden" name="kumyoung" value=<?=$kumyoung; ?>>
            <img src="./public/images/plusWhite.png" id="searchNewPlaylistSubmit"/>
        </form>
        
        <form method="post" action="index.php">
            
        
            <input type="hidden" name="action" value="addToPlaylist">
            <div class="superBox">
                <div class="box">
                
                    <label for="playlistId"><span>add song to playlist</span></label>
                    <select name="playlistId" id="playlistId">
                    <?php while ($playlist = $playlistsAdd->fetch()) { ?>
                        <?= '<option value="' .$playlist['playlistId'] .'">' .$playlist['playlistName'] .'</option>';?>
                        
                    
                    <?php } ?>
                    </select>
                </div>
                <div class="modalButtons openSans addSongToNewPlaylistButton">
                    <div name="newPlaylist" class="addPlaylistSearchBtn"><img src="./public/images/plusWhite.png"/></div>             
                </div>
            </div>
            
            <input type="hidden" name="song" value=<?=urlencode($song); ?>>
            <input type="hidden" name="singer" value=<?=urlencode($singer); ?>>
            <input type="hidden" name="tj" value=<?=$tj; ?>>
            <input type="hidden" name="kumyoung" value=<?=$kumyoung; ?>>
            <div class="modalButtons openSans">
                <input type="submit" name="add to playlist" value="add to playlist" class="btn btnBlue">
                <input type="button" name="cancel" value="Cancel" class="btn btnBlue">               
            </div>
            
        </form>
        
        

    </div>
</div>