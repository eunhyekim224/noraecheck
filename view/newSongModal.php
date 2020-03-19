<div class="modal">
    <div class="modalContent">
        <span class="close">&times;</span>
        <p>add song to playlist</p>
        <ul id="myListModal">
            <?php while ($playlist = $playlistsAdd->fetch()) { ?>
                <li>
                    <!-- <img src="public/images/mic.png" id="playListImg"> -->
                    <?= '<a href="index.php?action=showMySongs&playlistName=' .$playlist['playlistName'] .'&playlistId=' .$playlist['playlistId'] .'" class= "displayedPlaylistsModal">';?>
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