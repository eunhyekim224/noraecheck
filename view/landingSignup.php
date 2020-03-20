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
        <!-- <form method="POST" action="index.php"> -->

        <div id="kakaoLogin"><span>sign up with</span><img src="./public/images/kakaotalk.svg"></div>
        <!-- <p id="firstP"> please fill out all of the required fields</p>

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

        <!-- TESTING OUT NEW TYPES OF FORM #1 -->

<form method="POST" action="index.php">

<input type="text" name="name" class="question" id="nme" required autocomplete="off" />
<label for="nme"><span>login</span></label>

<textarea name="message" rows="2" class="question" id="msg" required autocomplete="off"></textarea>
<label for="msg"><span>email</span></label>

<input type="text" name="name" class="question" id="nme" required autocomplete="off" />
<label for="nme"><span>password</span></label>

<textarea name="message" rows="2" class="question" id="msg" required autocomplete="off"></textarea>
<label for="msg"><span>confirm password</span></label>

<input type="submit" value="Submit!" />
</form>

<!-- END -->

<!-- TESTING OUT NEW TYPES OF FORM #2 -->

<!-- <form>
<div class="omrs-input-group">
<label class="omrs-input-underlined">
<input required>
<span class="omrs-input-label">Normal</span>
<span class="omrs-input-helper">Helper Text</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><circle cx="15.5" cy="9.5" r="1.5"/><circle cx="8.5" cy="9.5" r="1.5"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm-5-6c.78 2.34 2.72 4 5 4s4.22-1.66 5-4H7z"/></svg>
</label>
</div>
<div class="omrs-input-group">
<label class="omrs-input-underlined omrs-input-danger">
<input required>
<span class="omrs-input-label">Danger</span>
<span class="omrs-input-helper">Helper Text</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><circle cx="15.5" cy="9.5" r="1.5"/><circle cx="8.5" cy="9.5" r="1.5"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm-5-6c.78 2.34 2.72 4 5 4s4.22-1.66 5-4H7z"/></svg>
</label>
</div>
<div class="omrs-input-group">
<label class="omrs-input-underlined">
<input required disabled>
<span class="omrs-input-label">Danger</span>
<span class="omrs-input-helper">Helper Text</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><circle cx="15.5" cy="9.5" r="1.5"/><circle cx="8.5" cy="9.5" r="1.5"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm-5-6c.78 2.34 2.72 4 5 4s4.22-1.66 5-4H7z"/></svg>
</label>
</div>
</form>
</div>

</form> -->

<!-- END -->

<!-- test form 3 out -->

<!-- <div class="page">
  <label class="field a-field a-field_a1">
    <input class="field__input a-field__input" placeholder="e.g. Stas" required>
    <span class="a-field__label-wrap">
      <span class="a-field__label">Login</span>
    </span>
  </label>
  <label class="field a-field a-field_a2">
    <input class="field__input a-field__input" placeholder="e.g. James" required>
    <span class="a-field__label-wrap">
      <span class="a-field__label">Email</span>
    </span>
  </label>    
  <label class="field a-field a-field_a3">
    <input class="field__input a-field__input" placeholder="e.g. EunHye" required>
    <span class="a-field__label-wrap">
      <span class="a-field__label">Password</span>
    </span>
  </label>
  <label class="field a-field a-field_a3">
    <input class="field__input a-field__input" placeholder="e.g. Marie" required>
    <span class="a-field__label-wrap">
      <span class="a-field__label">Confirm Password</span>
    </span>
  </label>
</div> -->

<!-- test form 3 end -->


    </div>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>
