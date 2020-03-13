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
        <div id="signIn" class="neonBlue">Sign in</div>
        <div id="createAccount" class="neonBlue">Create Account</div>
    </div>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>
