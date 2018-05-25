<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div>
    <h3>CONFIRM RESERVATION</h3>
</div>
<div class="row block col-md-4" style="margin-right:20px">
    <div class="col-md-12 text-center clear-padding">
        <div class="header">
            <h4>BOOKING SUMMARY</h4>
        </div>
        <div class="body">
            <table class="margin-offset-1 text-left">
                <tr>
                    <td class="label-1" style="width: 200px">Check In: </td>
                    <td class="label-1-sub"><?php echo $this->scope["checkIn"];?></td>
                </tr>
                <tr>
                    <td class="label-1">Check Out: </td>
                    <td class="label-1-sub"><?php echo $this->scope["checkOut"];?></td>
                </tr>
                <tr>
                    <td class="label-1">Night Stay(s):</td>
                    <td class="label-1-sub"><?php echo $this->scope["nightStay"];?></td>
                </tr>
                <tr>
                    <td class="label-1">Adults:</td>
                    <td class="label-1-sub"><?php echo $this->scope["adults"];?></td>
                </tr>
                <tr>
                    <td class="label-1">Children:</td>
                    <td class="label-1-sub"><?php echo $this->scope["children"];?></td>
                </tr>
            </table>
            <hr class="featurette-divider">
            <table class="margin-offset-1 text-left">
                <tr>
                    <td class="label-1" style="width: 200px">Room Selected: </td>
                    <td class="label-1-sub"><?php echo $this->scope["roomSelected"];?></td>
                </tr>
                <tr>
                    <td class="label-1" style="width: 200px">Rate per Night: </td>
                    <td class="label-1-sub"><?php echo $this->scope["roomRate"];?></td>
                </tr>
            </table>
            <hr class="featurette-divider">
            <table class="margin-offset-1 text-left">
                <tr>
                    <td class="label-1 font-weight-bold" style="width: 200px">Total Amount: </td>
                    <td class="label-1-sub font-weight-bold"><?php echo $this->scope["totalAmount"];?></td>
                </tr>
                <tr>
                    <td class="label-1" style="width: 200px">Amount To Pay Now: </td>
                    <td class="label-1-sub"><?php echo $this->scope["minPayable"];?></td>
                </tr>
                <tr>
                    <td class="label-1" style="width: 200px">Balance To be Paid: </td>
                    <td class="label-1-sub"><?php echo $this->scope["balanceToBePaid"];?></td>
                </tr>
            </table>
            <!-- <a href="<?php echo Config::get('application_path') . 'reservation.php'; ?>" class="btn btn-block btn-submit" style="width: 200px;">Edit Reservation</a> -->
        </div>
    </div>
    <div class="col-md-8">
    </div>
</div>

<div class="row block col-md-7">
    <div class="col-md-12  text-center clear-padding">
        <div class="header">
            <h4>GUEST DETAILS</h4>
        </div>
        <div class="body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="./registerReservation.php">
                        <input type="hidden" name="check_in" value="<?php echo $this->scope["checkIn"];?>" />
                        <input type="hidden" name="check_out" value="<?php echo $this->scope["checkOut"];?>" />
                        <input type="hidden" name="adults" value="<?php echo $this->scope["adults"];?>" />
                        <input type="hidden" name="children" value="<?php echo $this->scope["children"];?>" />
                        <input type="hidden" name="room_id" value="<?php echo $this->scope["roomId"];?>" />
                        <input type="hidden" name="breakfast-included" value="<?php echo $this->scope["breakfastIncluded"];?>" />

                        <input type="hidden" name="user_id" value="<?php echo $this->scope["userId"];?>" />
                        <input type="hidden" name="firstname" value="<?php echo $this->scope["firstname"];?>" />
                        <input type="hidden" name="lastname" value="<?php echo $this->scope["lastname"];?>" />
                        <input type="hidden" name="email_id" value="<?php echo $this->scope["emailId"];?>" />
                        <input type="hidden" name="country" value="<?php echo $this->scope["country"];?>" />
                        <input type="hidden" name="contact_no" value="<?php echo $this->scope["contactNo"];?>" />
                        <input type="hidden" name="userType" value="<?php echo $this->scope["userType"];?>" />
                        <div class="form-horizontal">
                            <div class="text-danger validation-summary-valid" data-valmsg-summary="true">
                                <ul>
                                    <li style="display:none"></li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="email_id" class="col-md-3 control-label">Email
                                    <span class="validation">*</span>
                                </label>
                                <div class="col-md-6">
                                    <input class="form-control" type="email" data-val="true" data-val-email="The Email field is not a valid e-mail address."
                                        data-val-required="The Email field is required." id="email_id" name="email_id" minlength="5" maxlength="50"  value="<?php echo $this->scope["emailId"];?>"
                                        <?php echo $this->scope["disabled"];?>>
                                    <span class="text-danger field-validation-valid" data-valmsg-for="email_id" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="col-md-3 control-label">Firstname
                                    <span class="validation">*</span>
                                </label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="<?php echo $this->scope["firstname"];?>" data-val="true" data-val-required="The Firstname field is required." minlength="2" maxlength="50" 
                                        id="firstname" name="firstname" <?php echo $this->scope["disabled"];?>>
                                    <span class="text-danger field-validation-valid" data-valmsg-for="firstname" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="col-md-3 control-label">Lastname
                                    <span class="validation">*</span>
                                </label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="<?php echo $this->scope["lastname"];?>" data-val="true" minlength="2" maxlength="50" data-val-required="The Lastname field is required."
                                        id="lastname" name="lastname" <?php echo $this->scope["disabled"];?>>
                                    <span class="text-danger field-validation-valid" data-valmsg-for="lastname" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address_line_one" class="col-md-3 control-label">Address 1</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" type="text" rows="2" data-val="false" maxlength="100" data-val-required="The Address 1 field is required." 
                                        id="address_line_one" name="address_line_one" <?php echo $this->scope["disabled"];?>><?php echo $this->scope["addressLineOne"];?></textarea>
                                    <span class="text-danger field-validation-valid" data-valmsg-for="address" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address_line_two" class="col-md-3 control-label">Address 2</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" type="text" rows="2" data-val="false" maxlength="100" data-val-required="The Address 2 field is required."
                                        id="address_line_two" name="address_line_two" <?php echo $this->scope["disabled"];?>><?php echo $this->scope["addressLineTwo"];?></textarea>
                                    <span class="text-danger field-validation-valid" data-valmsg-for="address_line_two" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-md-3 control-label">City</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="<?php echo $this->scope["city"];?>" data-val="false" maxlength="50" data-val-required="The City field is required."
                                        id="city" name="city" <?php echo $this->scope["disabled"];?>>
                                    <span class="text-danger field-validation-valid" data-valmsg-for="city" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country" class="col-md-3 control-label">Country
                                    <span class="validation">*</span>
                                </label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="<?php echo $this->scope["country"];?>" data-val="true" 
                                    minlength="2" maxlength="50"
                                    data-val-required="The Country field is required."
                                        id="country" name="country" <?php echo $this->scope["disabled"];?>>
                                    <span class="text-danger field-validation-valid" data-valmsg-for="country" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contact_no" class="col-md-3 control-label">Contact No
                                    <span class="validation">*</span>
                                </label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="<?php echo $this->scope["contactNo"];?>" data-val="true" minlength="2" maxlength="50" data-val-required="The Contact No field is required." 
                                        id="contact_no" name="contact_no" <?php echo $this->scope["disabled"];?>>
                                    <span class="text-danger field-validation-valid" data-valmsg-for="contact_no" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12  text-center clear-padding">
                            <div class="header">
                                <h4>PAYMENT DETAILS</h4>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <label for="card_type" class="col-md-3 control-label">Card Type
                                                    <span class="validation">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="card_type" id="card_type">
                                                        <option value="visa">VISA Card</option>
                                                        <option value="master">Master Card</option>
                                                        <option value="american">American Express Card</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="card_holders_name" class="col-md-3 control-label">Card Holder's Name
                                                    <span class="validation">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input class="form-control" type="text" data-val="true" data-val-required="The card holders name field is required." id="card_holders_name" minlength="2" maxlength="50"
                                                        name="card_holders_name">
                                                    <span class="text-danger field-validation-valid" data-valmsg-for="card_holders_name" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="card_no" class="col-md-3 control-label">Card No
                                                    <span class="validation">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input class="form-control" type="number" data-val="true" minlength="16" maxlength="16" data-val-required="The Card No field is required." id="card_no"
                                                        name="card_no">

                                                        <!-- This JS is to restrict upto 16 char
                                                            
                                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" data-val="true"  -->

                                                    <span class="text-danger field-validation-valid" data-valmsg-for="card_no" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="expiry_month" class="col-md-3 control-label">Expiry Month
                                                    <span class="validation">*</span>
                                                </label>
                                                <div class="col-md-3">
                                                    <select class="form-control" data-val="true" data-val-required="The expiry month field is required." id="expiry_month"
                                                        name="expiry_month">
                                                      
                                                            <option value="01">01</option>
                                                            <option value="02">02</option>
                                                            <option value="03">03</option>
                                                            <option value="04">04</option>
                                                            <option value="05">05</option>
                                                            <option value="06">06</option>
                                                            <option value="07">07</option>
                                                            <option value="08">08</option>
                                                            <option value="09">09</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                       
                                                        </select>
                                                    <span class="text-danger field-validation-valid" data-valmsg-for="expiry_month" data-valmsg-replace="true"></span>
                                                </div>
<!-- 
                                                <div class="col-md-6">
                                                    <input class="form-control" type="number" maxlength="2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" data-val="true" data-val-required="The expiry month field is required." id="expiry_month"
                                                        name="expiry_month">
                                                    <span class="text-danger field-validation-valid" data-valmsg-for="expiry_month" data-valmsg-replace="true"></span>
                                                </div> -->
                                            </div>
                                            <div class="form-group">
                                                <label for="expiry_year" class="col-md-3 control-label">Expiry Year
                                                    <span class="validation">*</span>
                                                </label>
                                                <div class="col-md-3">
                                                    <select class="form-control" data-val="true" data-val-required="The expiry year field is required." id="expiry_year"
                                                        name="expiry_year">
                                                        <?php 
$_for0_from = 2017;
$_for0_to = 2022;
$_for0_step = abs(1);
if (is_numeric($_for0_from) && !is_numeric($_for0_to)) { $this->triggerError('For requires the <em>to</em> parameter when using a numerical <em>from</em>'); }
$tmp_shows = $this->isArray($_for0_from, true) || (is_numeric($_for0_from) && (abs(($_for0_from - $_for0_to)/$_for0_step) !== 0 || $_for0_from == $_for0_to));
if ($tmp_shows)
{
	if ($this->isArray($_for0_from) == true) {
		$_for0_to = is_numeric($_for0_to) ? $_for0_to - $_for0_step : $this->count($_for0_from) - 1;
		$_for0_from = 0;
	}
	if ($_for0_from > $_for0_to) {
				$tmp = $_for0_from;
				$_for0_from = $_for0_to;
				$_for0_to = $tmp;
			}
	for ($this->scope['i'] = $_for0_from; $this->scope['i'] <= $_for0_to; $this->scope['i'] += $_for0_step)
	{
/* -- for start output */
?>
                                                            <option value="<?php echo $this->scope["i"];?>"><?php echo $this->scope["i"];?></option>
                                                        <?php /* -- for end output */
	}
}
?>
                                                    </select>
                                                    <span class="text-danger field-validation-valid" data-valmsg-for="expiry_year" data-valmsg-replace="true"></span>
                                                </div>

                                                <!-- <div class="col-md-6">
                                                    <input class="form-control" type="number" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"data-val="true" data-val-required="The expiry year field is required." id="expiry_year"
                                                        name="expiry_year">
                                                    <span class="text-danger field-validation-valid" data-valmsg-for="expiry_year" data-valmsg-replace="true"></span>
                                                </div> -->
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="submit" value="<?php echo $this->scope["buttonName"];?>" class="btn btn-info" />
                                                </div>
                                            </div>
                                            <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">

    </div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>