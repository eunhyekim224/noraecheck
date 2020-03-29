<div id="SignIn" class="modal" style="display:<?php if(isset($errors) AND isset($errors['context']) AND $errors['context'] == "signIn")  { echo "block";} ?>">
    <form name="form" id="loginForm" class="modal-content animate" action="index.php?action=login" method="POST">
        <div class="imgcontainer">
            <span class="close" title="Close Modal">&times;</span>
            <br>
            <p class="error" style='display:none;'>please fill all the fields</p>
            <div class="container">
                <p id="firstP"></p>
                <p class="loginformP">
                    <label class="field a-field a-field_a1">
                        <input name="username" type="text" name="username" id="username" maxlength="15" class="field__input a-field__input" placeholder="e.g. mr.trot101" required/>
                        <span class="a-field__label-wrap">
                            <label for="username" class="a-field__label">Username</label>
                            <?php 
                            if(isset($errors) AND isset($errors['username'])) {
                                echo "<p class='error'>".$errors['username']."</p>";
                            }        
                            ?>                
                        </span>
                    </label>
                </p>
                <p class="loginformP">
                    <label class="field a-field a-field_a3">
                        <input type="password" name="password" id="password" class="field__input a-field__input" placeholder="at least 8 characters" required />
                        <span class="a-field__label-wrap">
                            <label for="password" class="a-field__label">Password</label>
                            <?php 
                            if(isset($errors) AND isset($errors['password'])) {
                                echo "<p class='error'>".$errors['password']."</p>";
                            }
                            ?>
                        </span>
                    </label>
                </p>
                <p id="lastP">
                    <input type="submit" class="btn" name="submit" id="submitRegister" value="login" />
                    <input type="reset" class="btn" name="reset" id="reset" value="Reset" />
                </p>
            </div>
        </div>
    </form>
</div>