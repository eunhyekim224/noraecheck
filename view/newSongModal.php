<div class="modalSearch gothamPro">
    <div class="modalContentSearch">
        <!-- <p>add song to playlist</p> -->
        <label for="playlistName"><span>add song to playlist</span></label>
        <ul id="myListModal">
            
        
            <?php while ($playlist = $playlistsAdd->fetch()) { ?>
                <li>
                    <?= '<a href="index.php?action=addToPlaylist&playlistId='.$playlist['playlistId'] .'&song='.urlencode($song) .'&singer='.urlencode($singer) .'&tj='.$tj .'&kumyoung='.$kumyoung .'" class= "displayedPlaylistsModal">';?>
                    <div id="playlistInfo">
                        <p><?= $playlist['playlistName']; ?></p>
                         
                    </div>
                    <?= "</a>";?>
                </li>
            <?php } ?>
        </ul>
        <div class="modalButtons openSans">
                <input type="button" name="cancel" value="Cancel" class="btn btnBlue">               
            </div> 

    </div>
</div>