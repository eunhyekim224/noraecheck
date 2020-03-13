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
        <!-- add divs with the list of songs from js function -->
    </section>
    <nav id="nav">
        <ul>
            <li class="neonBlue">
                <img src="../public/images/search.png"/>
                <div>Search</div>
            </li>
            <li class="neonBlue">
                <img src="../public/images/profile.png"/>
                <div>Profile</div>
            </li>
            <li class="neonBlue">
                <img src="../public/images/challenge.png"/>
                <div>Challenge</div>
            </li>
            <li class="neonBlue">
                <img src="../public/images/songList.png"/>
                <div>My List</div>
            </li>
        </ul>
    </nav>
</div>
<?php $content = ob_get_clean();?>
<?php require('defaultTemplate.php');?>
