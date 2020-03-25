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
            <form method="post" action="index.php" id="editPlaylistForm">
                <input type="hidden" name="action" value="editPlaylist"/>
                <input type="hidden" name="playlistId" value="<?=$_SESSION['playlistId']; ?>" />
                <div class="albumIcon">
                    <img src="public/images/album2.png" id="mainPlaylistImg" title="Album icon">
                    <div>Edit</div>
                </div>
                <div id="editPlaylistInfo">
                    <input type="text" name="newPlaylistName" id="newPlaylistName" value="<?= $_GET['playlistName']; ?>" />
                    <p>by <?=  $_GET['username']; ?></p>
                    <p>
                        <i class="fas fa-music darkGrey" title="number of songs"></i>
                        <span class="darkGrey"><?= $_GET['songCount'];?></span>
                        <i class="far fa-calendar-alt darkGrey" title="creation date"></i>
                        <span class="darkGrey"><?= $_GET['playlistCreationDate']; ?></span>
                    </p>
                </div>
                <div id="editBtns">
                    <input type="button" name="cancelEdit" id="cancelEdit" value="Cancel" class="btn btnBlue">      
                    <input type="submit" name="edit" value="Edit" class="btn btnOrange">
                </div>       
            </form>
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



