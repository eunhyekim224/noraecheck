<?php $title = 'noraecheck';?>
<?php $style = 'style.css';?>

<?php ob_start();?>
<?php if (!$_SESSION['username']){
    header("location:index.php");
}
?>
<div class="mainWrapper homePage">
    <!-- include banner php file instead of header tag -->
    <?php include("homeBanner.php"); ?>
    
    <section id="mainContent" class="gothamPro">
    <?php
    if ($displayMode == 'playlists'){
        include("homeMyList.php");
    } else {
        include("playlistSongs.php");
    }
     ?>
        <!-- add divs with the list of songs from js function -->
    </section>   
    <?php include('nav.php'); ?>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>

