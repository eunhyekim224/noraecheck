<h1>my playlists</h1> 
<!-- $_SESSION['username']-->
<ul class="myList">
<li id="createPlaylist">
    <input type="image" name="newPlaylistBtn" id="newPlaylistBtn" src="https://upload.wikimedia.org/wikipedia/commons/9/9e/Plus_symbol.svg">
    <p id="createTxt">Create a new playlist</p>
    <?php include('newPlaylistModal.php'); ?>
</li>
<?php while ($playlist = $playlists->fetch()) { ?>
    <li>
        <img src="public/images/mic.png" id="playListImg">
        <?= '<a href="index.php?action=showMySongs&playlistName=' .$playlist['playlistName']
                .'&playlistId=' .$playlist['playlistId'] 
                .'&username=' .$playlist['username']
                .'&songCount=' .$playlist['songCount']
                .'&playlistCreationDate=' .$playlist['playlistCreationDate']
                .'" class= "displayedPlaylists">';?>
        <div id="playlistInfo">
            <p class="darkGrey" class="playlistNameText"><?= $playlist['playlistName']; ?></p>
            <p>by <?= $playlist['username']; ?></p>
            <p>
                <i class="fas fa-music darkGrey" title="number of songs"></i>
                <span class="darkGrey"><?= $playlist['songCount'];?></span>
                <i class="far fa-calendar-alt darkGrey" title="creation date"></i>
                <span class="darkGrey"><?= $playlist['playlistCreationDate']; ?></span>
            </p>
        </div>
        <?= "</a>";?>
    </li>
<?php } ?>
</ul>
<script src="./public/js/modalNewPlaylist.js"></script>