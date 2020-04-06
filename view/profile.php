<?php if ($currentProfile): ?>
    <div id="profileMainWrappe">
        <form  id="editProfileForm" action="index.php" method="POST">
            <?php if(isset($errors) AND isset($errors['blanks'])): ?>
                <div class='error'><?= $errors['blanks']; ?></div>
            <?php endif; ?> 
            <input type="hidden" name="action" id="action" value="editProfile"/>
            <input type="hidden" name="oldUsername" value="<?=$currentProfile['username']?>"/>
            <div class="editProfileBlock">
                <div class="profileImg">
                    <img src="public/images/profile2.png" id="editPlaylistImg" title="Profile icon">
                </div>
                <div class="profileContainer">
                    <p id="profilefirstP"></p>
                    <p class="profileformP">
                        <label id="usernameProfile" for="newUsername">Login</label>
                        <input type="text" name="newUsername" id="newUsername" maxlength="15" value=<?=$currentProfile['username']?> />
                        <?php if(isset($errors) AND isset($errors['loginNew'])): ?>
                            <div class='error'><?= $errors['loginNew']; ?></div>     
                        <?php endif; ?>    
                        <!-- <p class="error">that id has already been taken </p>  -->
                    </p>
                    <p class="profileformP">
                        <label id="emailProfile" type="emailProf">Email</label>
                        <input type="text" name="email" id="emailProf" value=<?=$currentProfile['email']?> />
                        <?php if(isset($errors) AND isset($errors['email'])): ?>
                            <div class='error'><?= $errors['email']; ?></div>  
                        <?php endif; ?>   
                        <!-- <p class="error">please enter a valid email address</p>  -->
                    </p>
                    
                    <!-- <p class="profileformP">
                        <label id="pwdProfile" for="oldPwd">Password to verify</label>
                        <input type="password" name="oldPwd" id="oldPwd"/>  
                        <php 
                        if(isset($errors) AND isset($errors['oldPwdConf'])) {
                            echo "<div class='error'>".$errors['oldPwdConf']."</div>";
                        }        
                        ?>  
                    </p> -->

                    <div id="changePwdBtn">Change password</div>
                    <div id="changePwd">
                        <p class="profileformP">
                            <label id="pwdProfile" for="newPwd"> New password</label>
                            <input type="password" name="newPwd" id="newPwd" placeholder="at lease 8 characters"/>  
                            <?php if(isset($errors) AND isset($errors['pwd'])): ?>
                                <div class='error'><?= $errors['pwd']; ?></div> 
                            <?php endif; ?>  
                            <!-- <p class="error">@TODO : add verification</p>  -->
                        </p>

                        <p class="profileformP">
                            <label id="conpwdProfile" type="newpwdConf">Confirm Password</label>
                            <input type="password" name="newpwdConf" id="newpwdConf" placeholder="same password"/>
                            <?php if(isset($errors) AND isset($errors['pwdConf'])): ?>
                                <div class='error'><?= $errors['pwdConf']; ?></div>   
                            <?php endif; ?>  
                            <!-- <p class="error">please make sure that your passwords are the same</p>  -->
                        </p>
                    </div>
                </div>
            </div>
            <p id="profilelastP">
                <input class="btn btnBlue" type="button" name="editProfileBtn" id="editProfileBtn" value="Edit"/>
                <input class="btn btnOrange" type="button" name="deleteProfileBtn" id="deleteProfileBtn" value="Delete"/>
            </p>
            <?php include("editProfileModal.php"); ?>
        </form>
    </div>
<?php endif; ?>
<script src="./public/js/editProfile.js"></script>

