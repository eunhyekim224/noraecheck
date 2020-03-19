<?php $title = 'noraecheck - Create account';?>
<?php $style = 'style.css';?>

<?php ob_start();?>


<div class="mainWrapper signupPage">
    
    <?php include("homeBanner.php"); ?>
    <div id='registrationContent'>
        

        
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

        <div id="kakaoLogin"><span>sign up with</span><img src="./public/images/kakaotalk.svg"></div>
        <p id="firstP"> please fill out all of the required fields</p>
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
            <p id="lastP">
                <input type="hidden" name="action" id="action" value="register">
                <input type="submit" name="submitRegister" id="submitRegister" value="Create"/>
                <input type="reset" name="reset" id="reset" value="Reset"/>
            </p>

        </form>
    </div>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>
