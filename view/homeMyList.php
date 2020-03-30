<h1>my playlists</h1> 
<!-- $_SESSION['username']-->
<ul class="myList">
<li id="createPlaylist">
    <div class="myListIcons">
        <input type="image" name="newPlaylistBtn" id="newPlaylistBtn" src="public/images/plusIcon2.png">
    </div>
    <div id="createTxt">Create a new playlist</div>
    <?php include('newPlaylistModal.php'); ?>
</li>
<?php while ($playlist = $playlists->fetch()): ?>
    <li>
        <div class="myListIcons">
            <input type="image" name="newPlaylistBtn" id="newPlaylistBtn" src="public/images/plusIcon2.png">
        </div>
        <div id="createTxt">Create a new playlist</div>
        <?= include('newPlaylistModal.php'); ?>
    </li>
<?php endwhile; ?>
</ul>
<script src="./public/js/modalNewPlaylist.js"></script>