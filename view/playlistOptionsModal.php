<div class="modal" id="playlistOptionsModal">
    <div class="modalContent" id="modalContent">
            <div class="modalButtons openSans">
                <div>
                    <?= "<a href=\"index.php?action=search&playlistId=" .$_SESSION['playlistId']."\">"; ?>
                        <input type="button" name="addSong" value="Add songs" class="btn btnBlue"> 
                    </a>        
                </div>
                <input type="button" name="editPlaylist" id="editPlaylist" value="Edit playlist" class="btn btnBlue">    
                <input type="button" name="delete" id="deletePlaylist" value="Delete playlist" class="btn btnOrange">           
            </div>
    </div>
</div>
<script src="./public/js/editOrDeletePlaylist.js"></script>
