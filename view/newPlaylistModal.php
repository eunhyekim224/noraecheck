<div class="modal">
    <div class="modalContent">
        <form method="post" action="index.php">
            <input type="hidden" name="action" value="newPlaylist">
            <input type="text" name="playlistName" class="question" id="playlistName" autocomplete="off" />
            <label for="playlistName"><span>What's the name of your playlist?</span></label>
            <div class="modalButtons openSans">
                <input type="submit" name="create" value="Create" class="btn btnBlue">
                <input type="button" name="cancel" value="Cancel" class="btn btnBlue">               
            </div>
        </form>
    </div>
</div>
