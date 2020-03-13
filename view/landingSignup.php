<?php $title = 'noraecheck - Create account';?>
<?php $style = 'style.css';?>

<?php ob_start();?>
<div class="mainWrapper signupPage">
    <div id="kakaoLogin"></div>
    <form method="POST" action="#">
        <p>
            <label for="login">Login: </label>
            <input type="text" name="login" id="login" maxlength="15"/>
        </p>
        <p>
            <label for="email">E-mail: </label>
            <input type="email" name="email" id="email"/>
        </p>
        <p>
            <label for="pwd">Password: </label>
            <input type="password" name="pwd" id="pwd"/>
        </p>
        <p>
            <label for="pwdConf">Confirm password: </label>
            <input type="password" name="pwdConf" id="pwdConf"/>
        </p>
        <p>
            <input type="submit" name="submit" id="submit" value="Create"/>
            <input type="reset" name="reset" id="reset" value="Reset"/>
        </p>
    </form>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>
