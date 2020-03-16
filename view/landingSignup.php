<?php $title = 'noraecheck - Create account';?>
<?php $style = 'style.css';?>

<?php ob_start();?>


<div class="mainWrapper signupPage">
    <div id="kakaoLogin"></div>

    <p> please fill out all of the required fields</p>
    <?php


    if ($error == 'logError'){
        echo '<p class="error">please make sure that your login fields are the same</p> ';
    }
    if ($error == 'passError'){
        echo '<p class="error">please make sure that your passwords are the same</p> ';
    }
    if ($error == 'logOld'){
        echo '<p class="error">that id has already been taken </p> ';
    }
    if ($error == 'mailError'){
        echo '<p class="error">please enter a valid email address</p> ';
    }

        ?>
    <form method="POST" action="index.php">
        <p>
            <label for="loginNew">Login: </label>
            <input type="text" name="loginNew" id="loginNew" maxlength="15"/>
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
            <input type="hidden" name="action" id="action" value="register">
            <input type="submit" name="submit" id="submit" value="Create"/>
            <input type="reset" name="reset" id="reset" value="Reset"/>
        </p>

    </form>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>
