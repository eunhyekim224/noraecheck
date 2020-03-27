<div id="mainPlaylist">
<?php while ($playlist = $mainPlaylist->fetch()) { $_SESSION['playlistId'] = $playlist['playlistId']?>

    <img src="public/images/album2.png" id="mainPlaylistImg">
    <div id="mainPlaylistInfo">
        <p class="darkGrey playlistNameText"><?= $playlist['playlistName']; ?></p>
        <p>by <?=  $playlist['username']; ?></p>
        <p>
            <i class="fas fa-music darkGrey" title="number of songs"></i>
            <span class="darkGrey"><?= $playlist['songCount'];?></span>
            <i class="far fa-calendar-alt darkGrey" title="creation date"></i>
            <span class="darkGrey"><?= $playlist['playlistCreationDate']; ?></span>
        </p>
        <div id="playlistOptions">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <?php include('playlistOptionsModal.php'); ?>
    </div>
</div>
<?php } ?>
<!-- $_SESSION['username']-->
<ul id="mySongList" class="myList">
<?php while ($song = $songDisplay->fetch()) { ?>
    <li>
        <img src="public/images/songResult3.png" class="songImgInPlaylistSongs">
        <div id="songsInOnePlaylist">
            <p id="songNameText" class="darkGrey"><?= $song['songName']; ?></p>
            <p>by <?= $song['singerName']; ?></p>
            <form method="post" action="index.php" class="songListBrands darkGrey">
                <input type="hidden" name="action" value="editBrandCode">
                <input type="hidden" name="songId" value=<?= $song['songId']; ?>>
                <input type="hidden" name="playlistId" value=<?= $_SESSION['playlistId']; ?>>
                <div class="songListBrandCodes">
                    <label for="tjCode<?= $song['songId']; ?>">TJ</label>
                    <input type="text" name="tjCode" maxlength=10 id="tjCode<?= $song['songId']; ?>" autocomplete="off" value=<?= $song['tjCode'];?> >
                </div>
                <div class="songListBrandCodes">
                    <label for="kumyoungCode<?= $song['songId']; ?>">KY</label>
                    <input type="text" name="kumyoungCode" maxlength=10 id="kumyoungCode<?= $song['songId']; ?>" autocomplete="off" value=<?= $song['kumyoungCode'];?> >
                </div>
            </form>
        </div>
        <img src="./public/images/minusIcon3.png" title="minus icon" alt="minus icon" class="minusIcon">
    </li>
    <div class="modal deleteSongModal">
    <div class="modalContent">
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="deleteSong">
            <input type="hidden" name="songId" value=<?= $song['songId']; ?>>
            <?php include('areYouSureModal.php'); ?>
        </form>
    </div>
</div>
<?php } ?>
</ul>
<script src="./public/js/modalPlaylistOptions.js"></script>
<script src="./public/js/modalEditPlaylist.js"></script>
<script src="./public/js/modalDeleteSong.js"></script>
<script src="./public/js/editBrandCode.js"></script>
