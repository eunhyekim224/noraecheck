<div id="topHeader" class="gothamPro">
    <div id="topMenu">
        <select id="lang">
            <option value="English">english</option>
        </select> 
        <span id="user"><?=$_SESSION['username'];?></span>
    </div>
    <div id="topMenuDropDown" class="hidden">
        <p id="bigUser"><?=$_SESSION['username'];?></p>
        <a href="index.php?action=logout">logout</a>
    </div>
    <script src="./public/js/topMenu.js"></script>
</div>