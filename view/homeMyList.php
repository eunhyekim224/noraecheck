
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
<?php foreach($playlists as $pl): ?>
    <li>
        <div class="myListIcons">
            <img src="public/images/album2.png" id="playListImg">
        </div>
         <a href="index.php?action=showMySongs&playlistId=<?= $pl['playlistId']; ?>" class= "displayedPlaylists">
            <div class="playlistInfo">
                <p class="darkGrey" class="playlistNameText"><?= $pl['playlistName']; ?></p>
                <p>by <?= $pl['username']; ?></p>
                <p>
                    <i class="fas fa-music darkGrey" title="number of songs"></i>
                    <span class="darkGrey"><?= $pl['songCount'];?></span>
                    <i class="far fa-calendar-alt darkGrey" title="creation date"></i>
                    <span class="darkGrey"><?= $pl['playlistCreationDate']; ?></span>
                </p>
            </div>
        </a>
    </li>
<?php endforeach; ?>
</ul>
<script src="./public/js/modalNewPlaylist.js"></script>

