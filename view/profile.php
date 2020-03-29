<?php if ($currentProfile) { ?>
<div id="profileMainWrappe">
    <form  id="editProfileForm" action="index.php" method="POST">
        <?php
        if(isset($errors) AND isset($errors['blanks'])) {
            echo "<div class='error'>".$errors['blanks']."</div>";
        }
        ?> 
        <input type="hidden" name="action" id="action" value="editProfile"/>
        <input type="hidden" name="oldUsername" value="<?=$currentProfile['username']?>"/>
        <div class="editProfileBlock">
            <div class="profileImg">
                <img src="public/images/profile2.png" id="editPlaylistImg" title="Profile icon">
                <!-- <div>Edit</div> -->
            </div>
            <div class="profileContainer">
                <p id="profilefirstP"></p>
                <p class="profileformP">
                    <label id="usernameProfile" for="newUsername">Login</label>
                    <input type="text" name="newUsername" id="newUsername" maxlength="15" value=<?=$currentProfile['username']?> />
                    <?php 
                    if(isset($errors) AND isset($errors['loginNew'])) {
                        echo "<div class='error'>".$errors['loginNew']."</div>";
                    }        
                    ?>    
                    <!-- <p class="error">that id has already been taken </p>  -->
                </p>

                <p class="profileformP">
                    <label id="emailProfile" type="emailProf">Email</label>
                    <input type="text" name="email" id="emailProf" value=<?=$currentProfile['email']?> />
                    <?php 
                    if(isset($errors) AND isset($errors['email'])) {
                        echo "<div class='error'>".$errors['email']."</div>";
                    }        
                    ?>   
                    <!-- <p class="error">please enter a valid email address</p>  -->
                </p>
                
                <p class="profileformP">
                    <label id="pwdProfile" for="oldPwd">Password to verify</label>
                    <input type="password" name="oldPwd" id="oldPwd"/>  
                    <?php 
                    if(isset($errors) AND isset($errors['oldPwdConf'])) {
                        echo "<div class='error'>".$errors['oldPwdConf']."</div>";
                    }        
                    ?>  
                </p>

                <div class="changePwdBtn">Change password</div>
                <div class="changePwd">
                    <p class="profileformP">
                        <label id="pwdProfile" for="newPwd"> New password</label>
                        <input type="password" name="newPwd" id="newPwd" placeholder="at lease 8 characters"/>  
                        <?php 
                        if(isset($errors) AND isset($errors['pwd'])) {
                            echo "<div class='error'>".$errors['pwd']."</div>";
                        }        
                        ?>  
                        <!-- <p class="error">@TODO : add verification</p>  -->
                    </p>

                    <p class="profileformP">
                        <label id="conpwdProfile" type="newpwdConf">Confirm Password</label>
                        <input type="password" name="newpwdConf" id="newpwdConf" placeholder="same password"/>
                        <?php 
                        if(isset($errors) AND isset($errors['pwdConf'])) {
                            echo "<div class='error'>".$errors['pwdConf']."</div>";
                        }        
                        ?>  
                        <!-- <p class="error">please make sure that your passwords are the same</p>  -->
                    </p>
                </div>
            </div>
        </div>
        <p id="profilelastP">
            <input class="btn btnBlue" type="submit" name="editProfileBtn" id="editProfileBtn" value="Edit"/>
            <input class="btn btnOrange" type="button" name="deleteProfileBtn" id="deleteProfileBtn" value="Delete"/>
        </p>
    </form>
    <div class="modal">
        <div class="modalContent deleteProfileModal">
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="deleteProfile">
                <input type="hidden" name="memberId" value=<?=$_SESSION['memberId']?>>
                <?php include('areYouSureModal.php'); ?>
            </form>
        </div>
    </div>
</div>
<?php } ?>
<script src="./public/js/editProfile.js"></script>

