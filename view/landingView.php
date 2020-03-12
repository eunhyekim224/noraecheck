<?php $title = 'Welcome to noraecheck';?>
<?php $style = 'landingStyle.css';?>

<?php ob_start();?>
<div id="landingWrapper">
    <div></div>
    <div></div>
    <div id="createAccount"></div>
    <div id="signIn"></div>
</div>
<?php $content = ob_get_clean();?>
<?php require('defaultTemplate.php');?>
