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
        <?php 

            if ($status == '1'){
                echo '<p class="good">account successfully created</p> ';
            }
            if ($error == 'logError'){
                echo '<p class="error">there are no accounts with that ID</p> ';
            }
            if ($error == 'passError'){
                echo '<p class="error">that password you\'ve entered is incorrect</p> ';
            }
            if ($error == 'missingField'){
                echo '<p class="error">please enter both fields</p> ';
            }

        ?>
        <div id="signIn">
            <span id="signInText" class="btn">Sign in</span>
            <form id="loginForm" method="POST" action="index.php">
                <p class="loginformP">
                    <label for="username">Username: </label>
                    <input type="text" name="username" id="username" maxlength="15"/>
                </p>
                <p class="loginformP">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password"/>
                </p>
                <input type="hidden" name="action" id="action" value="login">
                <input type="submit" name="submit" id="submit" value="login"/>
            </form>
        </div>
        
        <a href="index.php?action=register" id="createAccount" class="btn">Create Account</a>
    </div>
</div>
<script src="./public/js/login.js"></script>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>
