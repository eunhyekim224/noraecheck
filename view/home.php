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
    <?php include("homeMyList.php");?>
        <!-- add divs with the list of songs from js function -->
    </section>   
    <nav id="nav" class="openSans">
        <ul id="menuIcons">
            <li id="myListIcon" class="neonBlue">
                <a href="index.php?action=showMyList" title="Go to my list">
                    <img src="public/images/songList.png"/>
                    <p>My List</p>
                </a>
            </li>
            <li class="neonBlue">
                <a href="#" title="Go to challenge">
                    <img src="public/images/challenge.png"/>
                    <p>Challenge</p>
                </a>
            </li>
            <li class="neonBlue">
                <a href="#" title="Go to profile">
                    <img src="public/images/profile.png"/>
                    <p>Profile</p>
                </a>
            </li>
            <li class="neonBlue">
                <a href="index.php?action=search" title="Go to search">
                    <img src="public/images/search.png"/>
                    <p>Search</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>

