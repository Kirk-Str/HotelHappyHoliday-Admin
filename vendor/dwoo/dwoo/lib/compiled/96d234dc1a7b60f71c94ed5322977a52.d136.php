<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div>
    <h3><?php echo $this->scope["pageTitle"];?></h3>
</div>

<div class="row">
    <div class="col-md-10">
        <form method="POST" action="./actions/registerUser.php" enctype="multipart/form-data">
            <input type="hidden" name="type" value="<?php echo $this->scope["request_type"];?>">
            <div class="form-horizontal">
                <hr>
                <div class="text-danger validation-summary-valid" data-valmsg-summary="true">
                    <ul>
                        <li style="display:none"></li>
                    </ul>
                </div>
                <div class="form-group">
                    <label for="email_id" class="col-md-3 control-label">Email
                        <span class="validation">*</span>
                    </label>
                    <div class="col-md-4">
                        <input class="form-control" type="email" data-val="true" data-val-email="The Email field is not a valid e-mail address."
                            data-val-required="The Email field is required." id="email_id" name="email_id" value="<?php echo $this->scope["email"];?>">
                        <span class="text-danger field-validation-valid" data-valmsg-for="email_id" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">Password
                        <span class="validation">*</span>
                    </label>
                    <div class="col-md-4">
                        <input class="form-control" type="password" data-val="true" data-val-length="The Password must be at least 6 and at max 100 characters long."
                            data-val-length-max="100" data-val-length-min="6" data-val-required="The Password field is required."
                            id="password" name="password" value="<?php echo $this->scope["password"];?>">
                        <span class="text-danger field-validation-valid" data-valmsg-for="password" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmpassword" class="col-md-3 control-label">Confirm password
                        <span class="validation">*</span>
                    </label>
                    <div class="col-md-4">
                        <input class="form-control" type="password" data-val="true" data-val-equalto="The password and confirmation password do not match."
                            data-val-equalto-other="*.Password" id="confirmpassword" name="confirmpassword" value="<?php echo $this->scope["password"];?>">
                        <span class="text-danger field-validation-valid" data-valmsg-for="confirmpassword" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-md-3 control-label">Firstname
                        <span class="validation">*</span>
                    </label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" data-val="true" data-val-required="The Firstname field is required." id="firstname"
                            name="firstname" value="<?php echo $this->scope["firstname"];?>">
                        <span class="text-danger field-validation-valid" data-valmsg-for="firstname" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">

                    <label for="lastname" class="col-md-3 control-label">Lastname
                        <span class="validation">*</span>
                    </label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" data-val="true" data-val-required="The Lastname field is required." id="lastname"
                            name="lastname" value="<?php echo $this->scope["lastname"];?>">
                        <span class="text-danger field-validation-valid" data-valmsg-for="lastname" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address_line_one" class="col-md-3 control-label">Address 1</label>
                    <div class="col-md-4">
                        <textarea class="form-control" type="text" rows="2" data-val="false" data-val-required="The Address 1 field is required."
                            id="address_line_one" name="address_line_one"><?php echo $this->scope["address1"];?></textarea>
                        <span class="text-danger field-validation-valid" data-valmsg-for="address" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address_line_two" class="col-md-3 control-label">Address 2</label>
                    <div class="col-md-4">
                        <textarea class="form-control" type="text" rows="2" data-val="false" data-val-required="The Address 2 field is required."
                            id="address_line_two" name="address_line_two"><?php echo $this->scope["address2"];?></textarea>
                        <span class="text-danger field-validation-valid" data-valmsg-for="address_line_two" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-md-3 control-label">City</label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" data-val="false" data-val-required="The City field is required." id="city" name="city"
                            value="<?php echo $this->scope["city"];?>">
                        <span class="text-danger field-validation-valid" data-valmsg-for="city" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-md-3 control-label">Country
                        <span class="validation">*</span>
                    </label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" data-val="true" data-val-required="The Country field is required." id="country" name="country"
                            value="<?php echo $this->scope["country"];?>">
                        <span class="text-danger field-validation-valid" data-valmsg-for="country" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact_no" class="col-md-3 control-label">Contact No
                        <span class="validation">*</span>
                    </label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" data-val="true" data-val-required="The Contact No field is required." id="contact_no"
                            name="contact_no" value="<?php echo $this->scope["contactNo"];?>">
                        <span class="text-danger field-validation-valid" data-valmsg-for="contact_no" data-valmsg-replace="true"></span>
                    </div>
                </div>

                <?php if ((isset($this->scope["userType"]) ? $this->scope["userType"] : null) == 1) {
?>

                    <div class="form-group">
                        <label for="email_id" class="col-md-3 control-label">User Role
                            <span class="validation">*</span>
                        </label>
                        <div class="col-md-4">
                            <select class="form-control" name="role" id="role">
                                <option <?php echo $this->scope["registered"];?> value="2">Registered User</option>
                                <option <?php echo $this->scope["admin"];?> value="1">Admin User</option>
                                <option <?php echo $this->scope["nonRegistered"];?> value="3">Non-Registered</option>
                                <option <?php echo $this->scope["deactivated"];?> value="0">Deactivated</option>
                            </select>
                        </div>
                    </div>

                <?php 
}?>

                <div class="form-group">
                    <label for="avatar-image" class="col-md-3 control-label">Avatar</label>
                    <div class="col-md-4">
                        <input class="form-control-file" type="file" id="avatar-image" name="avatar-image" accept=".jpg, .jpeg, .png">
                    </div>
                </div>

               

                <div class="form-group">
                    <div class="col-md-offset-3 col-md-4">
                        <input type="submit" value="<?php echo $this->scope["buttonName"];?>" class="btn btn-info" />
                    </div>
                </div>
                <input type="hidden" name="token" value="<?php echo Token::generate();?>">
            </div>
        </form>
    </div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>