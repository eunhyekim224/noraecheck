<?php $title = 'noraecheck';?>
<?php $style = 'style.css';?>

<?php ob_start();?>
<?php if (!$_SESSION['username']){
    header("location:index.php");
}
?>
<div class="mainWrapper homePage">
    <!-- include banner php file instead of header tag -->
    <div id='search'>
        <div id="searchOptions">
            <div class="searchOption" id="song" ><span>song</span></div>
            <div class="searchOption hidden" id="singer"><span>artist</span></div>
            <div class="searchOption hidden" id="code"><span>code</span></div>
        </div>
        <input type="text" name="entry" id="entry" size="30" maxlength="50" required/>
        <input type="hidden" name="category" id="category" value="song">
        <button type="button"  id="submit"><img src="public/images/search.png"/></button>
    </div>
    <script src="./public/js/searchBarDisplay.js"></script>
    
    
    <section id="mainContent">
    
        <!-- add divs with the list of songs from js function -->
    </section>   
    <nav id="nav">
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
<script src="./public/js/songApi.js"></script>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>
