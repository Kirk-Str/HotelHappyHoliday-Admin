<div>
    <h3>CONFIRM RESERVATION</h3>
</div>

<div class="row block col-md-4" style="margin-right:20px">
    <div class="col-md-12 text-center clear-padding">
        <div class="header"><h4>BOOKING SUMMARY</h4></div>
        <div class="body">
            <table class="margin-offset-1 text-left">
                <tr>
                    <td class="label-1" style="width: 200px">Check In: </td>
                    <td class="label-1-sub">2017-08-09</td>
                </tr>
                <tr>
                    <td class="label-1">Check Out: </td>
                    <td class="label-1-sub">2017-08-10</td>
                </tr>
                <tr>
                    <td class="label-1">Night Stay(s):</td>
                    <td class="label-1-sub">8</td>
                </tr>
                <tr>
                    <td class="label-1">Adults:</td>
                    <td class="label-1-sub">2</td>
                </tr>
                <tr>
                    <td class="label-1">Children:</td>
                    <td class="label-1-sub">0</td>
                </tr>
            </table>
            <hr class="featurette-divider">
            <table class="margin-offset-1 text-left">
                <tr>
                    <td class="label-1" style="width: 200px">Room Selected: </td>
                    <td class="label-1-sub">Super Delux</td>
            </table>
            <button type="button" class="btn btn-block btn-submit" style="width: 200px;">Edit Reservation</button>
        </div>
    </div>
    <div class="col-md-8">

    </div>
</div>

<div class="row block col-md-7">
    <div class="col-md-12  text-center clear-padding">
        <div class="header"><h4>GUEST DETAILS</h4></div>
        <div class="body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="./actions/register.php" novalidate="novalidate">
                        <div class="form-horizontal">
                            <div class="text-danger validation-summary-valid" data-valmsg-summary="true">
                                <ul>
                                    <li style="display:none"></li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="email_id" class="col-md-3 control-label">Email</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="email" data-val="true" data-val-email="The Email field is not a valid e-mail address." data-val-required="The Email field is required." id="email_id" name="email_id" value="">
                                    <span class="text-danger field-validation-valid" data-valmsg-for="email_id" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="col-md-3 control-label">Firstname</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" data-val="true" data-val-required="The Firstname field is required." id="firstname" name="firstname">
                                    <span class="text-danger field-validation-valid" data-valmsg-for="firstname" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="lastname" class="col-md-3 control-label">Lastname</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" data-val="true" data-val-required="The Lastname field is required." id="lastname" name="lastname">
                                    <span class="text-danger field-validation-valid" data-valmsg-for="lastname" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address_line_one" class="col-md-3 control-label">Address 1</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" type="text" rows="2" data-val="false" data-val-required="The Address 1 field is required." id="address_line_one" name="address_line_one"></textarea>
                                    <span class="text-danger field-validation-valid" data-valmsg-for="address" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address_line_two" class="col-md-3 control-label">Address 2</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" type="text" rows="2" data-val="false" data-val-required="The Address 2 field is required." id="address_line_two" name="address_line_two"></textarea>
                                    <span class="text-danger field-validation-valid" data-valmsg-for="address_line_two" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-md-3 control-label">City</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" data-val="false" data-val-required="The City field is required." id="city" name="city">
                                    <span class="text-danger field-validation-valid" data-valmsg-for="city" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country" class="col-md-3 control-label">Country</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" data-val="true" data-val-required="The Country field is required." id="country" name="country">
                                    <span class="text-danger field-validation-valid" data-valmsg-for="country" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contact_no" class="col-md-3 control-label">Contact No</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" data-val="true" data-val-required="The Contact No field is required." id="contact_no" name="contact_no">
                                    <span class="text-danger field-validation-valid" data-valmsg-for="contact_no" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
              
                                        <input type="submit" value="Register" class="btn btn-info" />
                                    </div>
                                </div>
                            <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </div>
    <div class="col-md-8">

    </div>
</div>



