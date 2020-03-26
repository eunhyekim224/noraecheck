<?php $title = 'Welcome to noraecheck';?>
<?php $style = 'landingStyle.css';?>

<?php ob_start();?>
<div id="landingWrapper">

    <div id="brandBlock">
        <div class="brandName en">noraecheck</div>
        <div class="brandName kr">노래책</div>
    </div>

    <div id="equalizer">
        <?php include('equalizer.php');?>
    </div>
    <div id="accountBtns">
        <button type="button" id="signInText" class="btn" onclick="document.getElementById('SignIn').style.display='block'">Sign in</button>
        <button id="createAccount" class="btn" onclick="document.getElementById('SignUp').style.display='block'">Create Account</button>
    </div>
    
    <?php 
    require("landingSignIn.php"); 
    require("landingSignUp.php"); 
    ?>
</div>

<script src="./public/js/modalLanding.js"></script>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>
