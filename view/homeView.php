<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>noraecheck</title>
        <link rel="stylesheet" href="public/css/style.css"/> 
        <script src="https://kit.fontawesome.com/6254ef993b.js" crossorigin="anonymous"></script>
    </head> 
    <body>
        <div id="mainWrapper">
            <header id="banner">
                <div id="logo">Logo</div>
                Banner Picture
            </header>
            <section id="mainContent">
                <?php require('./view/myListView.php'); ?>
            </section>
            <nav id="nav">
                <ul id="menuIcons">
                    <li>
                        <img src="./public/images/search.png"/>
                        <div>Search</div>
                    </li>
                    <li>
                        <img src="./public/images/profile.png"/>
                        <div>Profile</div>
                    </li>
                    <li>
                        <img src="./public/images/challenge.png"/>
                        <div>Challenge</div>
                    </li>
                    <li id="myListIcon">    
                        <a href="index.php?action=showMyList" title="Go to my list">
                            <img src="public/images/songList.png"/>
                            <p>My List</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </body>
</html>
