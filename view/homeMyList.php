<h1>my playlists</h1> 
<!-- $_SESSION['username']-->
<ul id="myList">
<li id="createPlaylist">
    <input type="image" name="newPlaylistBtn" id="newPlaylistBtn" src="https://upload.wikimedia.org/wikipedia/commons/9/9e/Plus_symbol.svg">
    <p id="createTxt">Create a new playlist</p>
    <?php include('newPlaylistModal.php'); ?>
</li>
<?php while ($playlist = $playlists->fetch()) { ?>
    <li>
        <img src="public/images/mic.png" id="playListImg">
        <div id="playlistInfo">
            <p><?= $playlist['playlistName']; ?></p>
            <p>by <?= $playlist['username']; ?></p>
            <p>
                <i class="fas fa-music" title="number of songs"></i>
                <?= $playlist['songCount'];?>
                <i class="far fa-calendar-alt" title="creation date"></i>
                <?= $playlist['playlistCreationDate']; ?>
            </p>
        </div>
    </li>
<?php } ?>
</ul>
<script src="./public/js/modal.js"></script>