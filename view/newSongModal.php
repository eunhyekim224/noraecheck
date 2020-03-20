<div class="modalSearch">
    <div class="modalContent">
        <span class="close">&times;</span>
        <p>add song to playlist</p>
        <ul id="myListModal">
        <?= $song;?>
        <?= $singer;?>
        <?= $tj;?>
        <?= $kumyoung;?>
            <?php while ($playlist = $playlistsAdd->fetch()) { ?>
                <li>
                    <!-- <img src="public/images/mic.png" id="playListImg"> -->
                    <?= '<a href="index.php?action=addToPlaylist&playlistId='.$playlist['playlistId'] .'&song='.$song .'&singer='.$singer .'&tj='.$tj .'&kumyoung='.$kumyoung .'" class= "displayedPlaylistsModal">';?>
                    <div id="playlistInfo">
                        <p><?= $playlist['playlistName']; ?></p>
                        
                        
                    </div>
                    <?= "</a>";?>
                </li>
            <?php } ?>
        </ul>
        <input type="button" name="cancel" value="CANCEL"> 

    </div>
</div>