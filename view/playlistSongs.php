<?php 
    $_SESSION['playlistId'] = $_GET['playlistId'];
?>
<div id="mainPlaylist">
    <img src="public/images/album2.png" id="mainPlaylistImg">
    <div id="mainPlaylistInfo">
        <p class="darkGrey playlistNameText"><?= $_GET['playlistName']; ?></p>
        <p>by <?=  $_GET['username']; ?></p>
        <p>
            <i class="fas fa-music darkGrey" title="number of songs"></i>
            <span class="darkGrey"><?= $_GET['songCount'];?></span>
            <i class="far fa-calendar-alt darkGrey" title="creation date"></i>
            <span class="darkGrey"><?= $_GET['playlistCreationDate']; ?></span>
        </p>
        <div id="playlistOptions">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <?php include('playlistOptionsModal.php'); ?>
    </div>
</div>
<!-- $_SESSION['username']-->
<ul id="mySongList" class="myList">
<?php while ($song = $songDisplay->fetch()) { ?>
    <li>
        <img src="public/images/songResult3.png" class="songImgInPlaylistSongs">
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
        <img src="./public/images/minusIcon3.png" title="minus icon" alt="minus icon" class="minusIcon">
    </li>
<?php } ?>
<div class="modal" id="deleteSongModal">
    <div class="modalContent">
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="deleteSong">
            <?php include('areYouSureModal.php'); ?>
        </form>
    </div>
</div>
</ul>
<script src="./public/js/modalPlaylistOptions.js"></script>
<script src="./public/js/modalDeleteSong.js"></script>

