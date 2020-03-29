<div id="topHeader" class="gothamPro">
    <div id="topMenu">
        <select id="lang">
            <option value="English">english</option>
        </select> 
        <span id="user"><?=$_SESSION['username'];?></span>
    </div>
    <div id="topMenuDropDown" class="hidden">
        <a href="index.php?action=showProfile" title="Go to profile">
            <p id="bigUser"><?=$_SESSION['username'] ?> </p>
        </a>
        <a href="index.php?action=logout">logout</a>
    </div>
    <script src="./public/js/topMenu.js"></script>
</div>