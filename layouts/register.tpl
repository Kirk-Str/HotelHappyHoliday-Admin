<h2>Register</h2>
<div class="row">
    <div class="col-md-10">
        <form method="POST" action="./actions/register.php" novalidate="novalidate">
        <div class="form-horizontal">
            <h4>Create a new account.</h4>
            <hr>
            <div class="text-danger validation-summary-valid" data-valmsg-summary="true"><ul><li style="display:none"></li>
            </ul></div>
            <div class="form-group">
                <label for="email_id" class="col-md-2 control-label">Email</label>
                <div class="col-md-4">
                <input class="form-control" type="email" data-val="true" data-val-email="The Email field is not a valid e-mail address." data-val-required="The Email field is required." id="email_id" name="email_id" value="">
                <span class="text-danger field-validation-valid" data-valmsg-for="email_id" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-2 control-label">Password</label>
                <div class="col-md-4">
                <input class="form-control" type="password" data-val="true" data-val-length="The Password must be at least 6 and at max 100 characters long." data-val-length-max="100" data-val-length-min="6" data-val-required="The Password field is required." id="password" name="password">
                <span class="text-danger field-validation-valid" data-valmsg-for="password" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="confirmpassword" class="col-md-2 control-label">Confirm password</label>
                <div class="col-md-4">
                <input class="form-control" type="password" data-val="true" data-val-equalto="The password and confirmation password do not match." data-val-equalto-other="*.Password" id="confirmpassword" name="confirmpassword">
                <span class="text-danger field-validation-valid" data-valmsg-for="confirmpassword" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-md-2 control-label">Firstname</label>
                <div class="col-md-4">
                <input class="form-control" type="text" data-val="true" data-val-required="The Firstname field is required." id="firstname" name="firstname">
                <span class="text-danger field-validation-valid" data-valmsg-for="firstname" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
            
                <label for="lastname" class="col-md-2 control-label">Lastname</label>
                <div class="col-md-4">
                <input class="form-control" type="text" data-val="true" data-val-required="The Lastname field is required." id="lastname" name="lastname">
                <span class="text-danger field-validation-valid" data-valmsg-for="lastname" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="address_line_one" class="col-md-2 control-label">Address 1</label>
                <div class="col-md-4">
                <textarea class="form-control" type="text" rows="2" data-val="false" data-val-required="The Address 1 field is required." id="address_line_one" name="address_line_one"></textarea>
                <span class="text-danger field-validation-valid" data-valmsg-for="address" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="address_line_two" class="col-md-2 control-label">Address 2</label>
                <div class="col-md-4">
                <textarea class="form-control" type="text" rows="2" data-val="false" data-val-required="The Address 2 field is required." id="address_line_two" name="address_line_two"></textarea>
                <span class="text-danger field-validation-valid" data-valmsg-for="address_line_two" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="city" class="col-md-2 control-label">City</label>
                <div class="col-md-4">
                <input class="form-control" type="text" data-val="false" data-val-required="The City field is required." id="city" name="city">
                <span class="text-danger field-validation-valid" data-valmsg-for="city" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="country" class="col-md-2 control-label">Country</label>
                <div class="col-md-4">
                <input class="form-control" type="text" data-val="true" data-val-required="The Country field is required." id="country" name="country">
                <span class="text-danger field-validation-valid" data-valmsg-for="country" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="contact_no" class="col-md-2 control-label">Contact No</label>
                <div class="col-md-4">
                <input class="form-control" type="text" data-val="true" data-val-required="The Contact No field is required." id="contact_no" name="contact_no">
                <span class="text-danger field-validation-valid" data-valmsg-for="contact_no" data-valmsg-replace="true"></span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-4">
                    <input type="submit" value="Register" class="btn btn-info" />
                </div>
            </div>
            <input type="hidden" name="token" value="<?php echo Token::generate();?>">
        </div>
        </form>
    </div>
</div>