<h1>my playlists</h1> 
<!-- $_SESSION['username']-->
<ul id="myList">
<li id="createImg">
    <input type="image" name="newPlaylist" id="newPlaylist" src="https://upload.wikimedia.org/wikipedia/commons/9/9e/Plus_symbol.svg">
    <p>Create a new playlist</p>
    <?php include('newPlaylistModal.php'); ?>
</li>
<?php while ($playlist = $playlists->fetch()) { ?>
    <li>
        <img src="public/images/mic.png" id="playListImg">
        <?= '<a href="index.php?action=showMySongs&playlistName=' .$playlist['playlistName'] .'&playlistId=' .$playlist['playlistId'] .'" class= "displayedPlaylists">';?>
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
        <?= "</a>";?>
    </li>
<?php } ?>
</ul>
<script src="./public/js/modal.js"></script>