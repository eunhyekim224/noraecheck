<?php $title = 'noraecheck';?>
<?php $style = 'defaultStyle.css';?>

<?php ob_start();?>
<div class="mainWrapper homePage">
    <!-- include banner php file instead of header tag -->
    <!-- <php inlcude(); ?> -->
    <header id="banner">
        <div id="logo">Logo</div>
        Banner Picture
    </header>
    <section id="mainContent">
    <?php include("myListView.php");?>
        <!-- add divs with the list of songs from js function -->
    </section>   
    <nav id="nav">
        <ul id="menuIcons">
            <li class="neonBlue">
                <img src="public/images/search.png"/>
                <p>Search</p>
            </li>
            <li class="neonBlue">
                <img src="public/images/profile.png"/>
                <p>Profile</p>
            </li>
            <li class="neonBlue">
                <img src="public/images/challenge.png"/>
                <p>Challenge</p>
            </li>
            <li id="myListIcon" class="neonBlue">
                <a href="index.php?action=showMyList" title="Go to my list">
                    <img src="public/images/songList.png"/>
                    <p>My List</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
<?php $content = ob_get_clean();?>
<?php require('defaultTemplate.php');?>

