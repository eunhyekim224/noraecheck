<h1>my playlists</h1> 
<!-- $_SESSION['username']-->
<?php 
//keep people from accessing the playlist view page without loggin in
if (!$_SESSION['memberId']){
    header('Location: index.php');
}
?>
<ul id="myList">
<?php while ($playlist = $playlists->fetch()) { ?>
    <li>
        <img src="public/images/mic.png" id="playListImg">
        <div id="playlistInfo">
            <p><?= $playlist['playlistName'] ?></p>
            <p>by <?= $playlist['username'] ?></p>
            <p><?= $playlist['playlistCreationDate'] ?></p> 
        </div>
    </li>
<?php } ?>
</ul>
