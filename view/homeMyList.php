<h1>my playlists</h1> 
<!-- $_SESSION['username']-->
<ul id="myList">
<?php while ($playlist = $playlists->fetch()) { ?>
    <li>
        <img src="public/images/mic.png" class="playListImg">
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
