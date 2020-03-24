<div class="modal" id="playlistOptionsModal">
    <div class="modalContent" id="modalContent">
            <div class="modalButtons openSans" id="mainOptions">
                <div>
                    <?= "<a href=\"index.php?action=search&playlistId=" .$_SESSION['playlistId']."\">"; ?>
                        <input type="button" name="addSong" value="Add songs" class="btn btnBlue"> 
                    </a>        
                </div>
                <input type="button" name="editPlaylist" id="editPlaylist" value="Edit playlist" class="btn btnBlue">    
                <input type="button" name="delete" id="deletePlaylist" value="Delete playlist" class="btn btnOrange">           
            </div>
            <form method="post" action="index.php" id="areYouSure">
                <input type="hidden" name="action" value="deletePlaylist">
                <p>Are you sure?<p>
                <div id="areYouSureBtns">
                    <input type="button" name="cancelDel" id="cancelDel" value="Cancel" class="btn btnBlue">      
                    <input type="submit" name="delete" value="Delete" class="btn btnOrange">
                </div>      
            </form> 
    </div>
</div>
<script src="./public/js/addNewModalContent.js"></script>



