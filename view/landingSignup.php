<?php $title = 'noraecheck - Create account';?>
<?php $style = 'style.css';?>

<?php ob_start();?>


<div class="mainWrapper signupPage">
    
    <?php 
    // include("homeBanner.php"); 
    ?>
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


    <!-- <div id="kakaoLogin"><span>sign up with</span><img src="./public/images/kakaotalk.svg"></div> -->
       
    <!-- <form method="POST" action="index.php">

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

        </form> -->

<!-- test form 3 out -->
<!-- <form method="POST" action="index.php">

<p id="firstP"> please fill out all of the required fields</p>

<p>
    <label class="field a-field a-field_a1">
        <input type="text" name="loginNew" id="loginNew" maxlength"15" class="field__input a-field__input" placeholder="e.g. Stas" required/>
            <span class="a-field__label-wrap">
                <label for="loginNew" class="a-field__label">Login</label>
            </span>
    </label>
</p>

<p>
    <label class="field a-field a-field_a2">
        <input type="email" name="email" id="email" class="field__input a-field__input" placeholder="e.g. James" required>
            <span class="a-field__label-wrap">
                <label type="email" class="a-field__label">Email</label>
        </span>
    </label>
</p>

<p>
    <label class="field a-field a-field_a3">
        <input type="password" name="pwd" id="pwd" class="field__input a-field__input" placeholder="e.g. EunHye" required>
            <span class="a-field__label-wrap">
            <label for="pwd" class="a-field__label">Password</label>
        </span>
    </label>
</p>

<p>
    <label class="field a-field a-field_a3">
        <input type="password" name="pwdConf" id="pwdConf" class="field__input a-field__input" placeholder="e.g. Marie" required>
            <span class="a-field__label-wrap">
            <label type="pwdConf" class="a-field__label">Confirm Password</label>
        </span>
    </label>
</p>

<p id="lastP">
    <input type="hidden" name="action" id="action" value="register">
    <input type="submit" name="submitRegister" id="submitRegister" value="Create"/>
    <input type="reset" name="reset" id="reset" value="Reset"/>
</p>

</form> -->

<!-- test form 3 end -->

    </div>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>
