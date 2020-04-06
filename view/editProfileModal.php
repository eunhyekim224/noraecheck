<div class="modal" style="display:<?php if(isset($errors) AND isset($errors['context']) AND $errors['context'] == "editProfile")  { echo "block";} ?>">
    <div class="modalContent editProfileVerifyModal">
        <p class="profileformP">
            <label id="pwdProfile" for="oldPwd">Password to verify</label>
            <input type="password" name="oldPwd" id="oldPwd"/>  
            <?php if(isset($errors) AND isset($errors['oldPwdConf'])): ?>
                <div class='error'><?= $errors['oldPwdConf']; ?></div>      
            <?php endif; ?>  
        </p>
        <div class="editProfileBtns">
            <input type="submit" name="edit" value="OK" class="btn btnBlue">
            <input type="button" name="cancelEdit" value="Cancel" class="btn btnOrange">
        </div> 
    </div>
</div>