<div id="mainPlaylist">
<?php if ($mainPlaylist): $_SESSION['playlistId'] = $mainPlaylist['playlistId']?>
    <img src="public/images/album2.png" id="mainPlaylistImg" title="Album icon">
    <div id="mainPlaylistInfo">
        <p class="darkGrey playlistNameText"><?= $mainPlaylist['playlistName']; ?></p>
        <p>by <?=$mainPlaylist['username'];?></p>
        <p>
            <i class="fas fa-music darkGrey" title="number of songs"></i>
            <span class="darkGrey"><?= $mainPlaylist['songCount'];?></span>
            <i class="far fa-calendar-alt darkGrey" title="creation date"></i>
            <span class="darkGrey"><?= $mainPlaylist['playlistCreationDate']; ?></span>
        </p>
        <div id="playlistOptions">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <?php include('playlistOptionsModal.php'); ?>
    </div>
    <a href="index.php?action=showMyList" title="Go back to my list">
        <!-- <div> -->
            <img src="public/images/backArrow2.png" id="goBackBtn" title="Back button">
        <!-- </div> -->
    </a>
</div>
<?php endif; ?>

<ul id="mySongList" class="myList">
    <?php foreach($songDisplay as $sng): ?>
        <li>
            <img src="public/images/songResult3.png" class="songImgInPlaylistSongs">
            <div id="songsInOnePlaylist">
                <p id="songNameText" class="darkGrey"><?= $sng['songName'];?></p>
                <p>by <?= $sng['singerName']; ?></p>
                <form method="post" action="index.php" class="songListBrands darkGrey">
                    <input type="hidden" name="action" value="editBrandCode">
                    <input type="hidden" name="page" value="playlistSongs">
                    <input type="hidden" name="songId" value=<?= $sng['songId'];?>>
                    <input type="hidden" name="playlistId" value=<?= $_SESSION['playlistId'];?>>
                    <div class="songListBrandCodes">
                        <label for="tjCode<?= $sng['songId']; ?>">TJ</label>
                        <input type="text" name="tjCode" maxlength=10 id="tjCode<?=$sng['songId'];?>" autocomplete="off" value=<?=$sng['tjCode'];?> >
                    </div>
                    <div class="songListBrandCodes">
                        <label for="kumyoungCode<?=$sng['songId'];?>">KY</label>
                        <input type="text" name="kumyoungCode" maxlength=10 id="kumyoungCode<?=$sng['songId'];?>" autocomplete="off" value=<?=$sng['kumyoungCode'];?> >
                    </div>
                </form>
            </div>
            <img src="./public/images/minusIcon3.png" title="minus icon" alt="minus icon" class="minusIcon">
        </li>
        <div class="modal deleteSongModal">
            <div class="modalContent">
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="deleteSong"/>
                    <input type="hidden" name="songId" value=<?= $sng['songId']; ?>/>
                    <?php include('areYouSureModal.php'); ?>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</ul>
<script src="./public/js/modalPlaylistOptions.js"></script>
<script src="./public/js/modalEditPlaylist.js"></script>
<script src="./public/js/modalDeleteSong.js"></script>
<script src="./public/js/editBrandCode.js"></script>
