<div class="modal" id="playlistOptionsModal">
    <div class="modalContent">
        <form method="post" action="index.php">
            <input type="hidden" name="action" value="deletePlaylist">
            <div class="modalButtons openSans">
                <div>
                    <?= "<a href=\"index.php?action=search&playlistId=" .$_SESSION['playlistId']."\">"; ?>
                        <input type="button" name="addSong" value="Add songs" class="btn btnBlue"> 
                    </a>        
                </div>
                <input type="button" name="editPlaylist" value="Edit playlist" class="btn btnBlue">    
                <input type="submit" name="delete" value="Delete playlist" class="btn btnOrange">           
            </div>
        </form>
    </div>
</div>
<script src="./public/js/modalPlaylistOptions.js"></script>