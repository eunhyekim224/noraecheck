<h1><?= $playlistName; ?></h1> 
<!-- $_SESSION['username']-->
<ul id="myList">
<li id="createImg">
    <a href="index.php?action=showMyList"><img src="./public/images/backArrow.png"></a>
</li>
<?php while ($song = $songDisplay->fetch()) { ?>
    <li>
        <img src="public/images/mic.png" id="songImg">
        <div id="songInfo">
            <p><?= $song['songName']; ?></p>
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
