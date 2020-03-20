<div id="mainPlaylist">
    <img src="public/images/mic.png" id="mainPlaylistImg">
    <div id="mainPlaylistInfo">
        <p class="darkGrey playlistNameText"><?= $_GET['playlistName']; ?></p>
        <p>by <?=  $_GET['username']; ?></p>
        <p>
            <i class="fas fa-music darkGrey" title="number of songs"></i>
            <span class="darkGrey"><?= $_GET['songCount'];?></span>
            <i class="far fa-calendar-alt darkGrey" title="creation date"></i>
            <span class="darkGrey"><?= $_GET['playlistCreationDate']; ?></span>
        </p>
        <div class="playlistOptions">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
    </div>
</div>
<!-- $_SESSION['username']-->
<ul id="mySongList" class="myList">
<?php while ($song = $songDisplay->fetch()) { ?>
    <li>
        <img src="public/images/songResult.png" id="songImgInPlaylistSongs">
        <div id="songsInOnePlaylist">
            <p id="songNameText" class="darkGrey"><?= $song['songName']; ?></p>
            <p>by <?= $song['singerName']; ?></p>
            <p>
                <label> tj code </label>
                <?= $song['tjCode'];?>
                <label> kumyoung code </label>
                <?= $song['kumyoungCode']; ?>
            </p>
        </div>
    </li>
<?php } ?>
</ul>
