<form method="post" action="index.php" id="areYouSure">
    <input type="hidden" name="action" value="deletePlaylist">
    <p>Are you sure?<p>
    <div id="areYouSureBtns">
        <input type="button" name="cancelDel" id="cancelDel" value="Cancel" class="btn btnBlue" onclick="location.reload()">      
        <input type="submit" name="delete" value="Delete" class="btn btnOrange">
    </div>      
</form> 