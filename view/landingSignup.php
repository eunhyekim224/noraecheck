<div id="SignUp" class="modal" style="display:<?php if(isset($errors) AND isset($errors['contextUp']) AND $errors['contextUp'] == "signUp")  { echo "block";} ?>">
    <form class="modal-content animate" id="signUpForm" action="index.php?action=register" method="POST">
        <input type="hidden" name="action" id="action" value="register"/>
        <div class="imgcontainer">
            <span class="close" title="Close Modal">&times;</span>
            <br>
            <p class="error" style='display:none;'>please fill all the fields</p>
        </div>
        <div class="container">
            <p id="firstP"></p>
            <p class="signformP">
                <label class="field a-field a-field_a1">
                    <input type="text" name="loginNew" id="loginNew" maxlength="15" class="field__input a-field__input" placeholder="e.g. mrs.trot102" required/>
                    <span class="a-field__label-wrap">
                        <label id="loginland" for="loginNew" class="a-field__label">Login</label>
                        <?php 
                        if(isset($errors) AND isset($errors['loginNew'])) {
                           echo "<p class='error'>".$errors['loginNew']."</p>";
                        }        
                        ?>    
                    </span>
                </label>
            </p>
            <p class="signformP">
                <label class="field a-field a-field_a2">
                    <input type="text" name="email" id="email" class="field__input a-field__input" placeholder="e.g. karaokelife@mail" required/>
                        <span class="a-field__label-wrap">
                            <label id="emailland" type="email" class="a-field__label">Email</label>
                            <?php 
                            if(isset($errors) AND isset($errors['email'])) {
                                echo "<p class='error'>".$errors['email']."</p>";
                            }        
                            ?>   
                        </span>
                </label>
            </p>
            <p class="signformP">
                <label class="field a-field a-field_a3">
                    <input type="password" name="pwd" id="pwd" class="field__input a-field__input" placeholder="at lease 8 characters" required/>
                        <span class="a-field__label-wrap">
                            <label id="pwdland" for="pwd" class="a-field__label">Password</label>
                            <?php 
                            if(isset($errors) AND isset($errors['pwd'])) {
                                echo "<p class='error'>".$errors['pwd']."</p>";
                            }        
                            ?>  
                        </span>
                </label>
            </p>
            <p class="signformP">
                <label class="field a-field a-field_a3">
                    <input type="password" name="pwdConf" id="pwdConf" class="field__input a-field__input" placeholder="same password" required/>
                        <span class="a-field__label-wrap">
                            <label id="conpwdland" type="pwdConf" class="a-field__label">Confirm Password</label>
                            <?php 
                            if(isset($errors) AND isset($errors['pwdConf'])) {
                                echo "<p class='error'>".$errors['pwdConf']."</p>";
                            }        
                            ?>  
                        </span>
                </label>
            </p>
            <p id="lastP">
                <input class="btn" type="submit" name="submitSignUp" id="submitSignUp" value="Create"/>
                <input class="btn" type="reset" name="reset" id="reset"  value="Reset"/>
            </p>
        </div>
    </form>
</div>