<h1>my playlists</h1> 
<!-- $_SESSION['username']-->
<ul id="myList">
<li id="createPlaylist">
    <input type="image" name="newPlaylistBtn" id="newPlaylistBtn" src="public/images/plusIcon2.png">
    <p id="createTxt">Create a new playlist</p>
    <?php include('newPlaylistModal.php'); ?>
</li>
<?php while ($playlist = $playlists->fetch()) { ?>
    <li>
        <img src="public/images/mic.png" id="playListImg" title="Playlist icon">
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