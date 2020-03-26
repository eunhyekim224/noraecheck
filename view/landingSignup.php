<div id="SignUp" class="modal">
    <form class="modal-content animate" id="signUpForm" action="index.php" method="POST">
        <input type="hidden" name="action" id="action" value="register"/>
        <div class="imgcontainer">
            <span class="close" title="Close Modal">&times;</span>
            <br>
            <p class="error">please fill all the fields</p>
        </div>
        <div class="container">
            <p id="firstP"></p>
            <p>
                <label class="field a-field a-field_a1">
                    <input type="text" name="loginNew" id="loginNew" maxlength="15" class="field__input a-field__input" placeholder="e.g. mrs.trot102" required/>
                    <span class="a-field__label-wrap">
                        <label id="loginland" for="loginNew" class="a-field__label">Login</label>
                        <p class="error">that id has already been taken </p> 
                    </span>
                </label>
            </p>

            <p>
                <label class="field a-field a-field_a2">
                    <input type="text" name="email" id="email" class="field__input a-field__input" placeholder="e.g. karaokelife@mail" required/>
                        <span class="a-field__label-wrap">
                            <label id="emailland" type="email" class="a-field__label">Email</label>
                            <p class="error">please enter a valid email address</p> 
                        </span>
                </label>
            </p>

            <p>
                <label class="field a-field a-field_a3">
                    <input type="password" name="pwd" id="pwd" class="field__input a-field__input" placeholder="at lease 8 characters" required/>
                        <span class="a-field__label-wrap">
                            <label id="pwdland" for="pwd" class="a-field__label">Password</label>
                            <p class="error">@TODO : add verification</p> 
                        </span>
                </label>
            </p>

            <p>
                <label class="field a-field a-field_a3">
                    <input type="password" name="pwdConf" id="pwdConf" class="field__input a-field__input" placeholder="same password" required/>
                        <span class="a-field__label-wrap">
                            <label id="conpwdland" type="pwdConf" class="a-field__label">Confirm Password</label>
                            <p class="error">please make sure that your passwords are the same</p> 
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