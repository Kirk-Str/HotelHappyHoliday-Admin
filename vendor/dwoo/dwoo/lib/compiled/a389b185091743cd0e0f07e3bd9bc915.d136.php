<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div>
    <h3>CONFIRM RESERVATION</h3>
</div>

<div class="row block <?php echo $this->scope["inputBlockStyle"];?> col-md-7">
    <div class="col-md-12  text-center clear-padding">
        <div class="header <?php echo $this->scope["inputHeaderStyle"];?>"><h4><?php echo $this->scope["formHeader"];?></h4></div>
        <div class="body">
            <div class="row">
                <div class="col-md-12">
                    <form id="check-in-form" method="POST" action="./actions/confirmation.php?requestId=<?php echo $this->scope["reservationId"];?>">
                        <input type="hidden" name="type" id="type" value="<?php echo $this->scope["type"];?>" />
                        <div class="form-horizontal">
                            <div class="text-danger validation-summary-valid" data-valmsg-summary="true">
                                <ul>
                                    <li style="display:none"></li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="email_id" class="col-md-3 control-label">Reservation Id</label>
                                <div class="col-md-2">
                                    <input class="form-control" type="text" value="<?php echo $this->scope["reservationId"];?>" id="reservation_id" name="reservation_id" <?php echo $this->scope["disabled"];?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="col-md-3 control-label">Firstname</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="<?php echo $this->scope["firstname"];?>" id="firstname" name="firstname" <?php echo $this->scope["disabled"];?>>
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="lastname" class="col-md-3 control-label">Lastname</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="<?php echo $this->scope["lastname"];?>" id="lastname" name="lastname" <?php echo $this->scope["disabled"];?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="actual_adults" class="col-md-3 control-label">Adults</label>
                                <div class="col-md-2">
                                    <input class="form-control" type="number" value="<?php echo $this->scope["actualAdults"];?>" id="actual_adults" name="actual_adults" data-val="true" data-val-required="The Adults field is required." 
                                    min="1" max="6" data-val-min="Minimum 1 guest should present"
                                    <?php echo $this->scope["disabledAdults"];?>>
                                </div>
                                <div class="d-block">
                                <span class="text-danger field-validation-valid" data-valmsg-for="actual_adults" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="actual_children" class="col-md-3 control-label">Children</label>
                                <div class="col-md-2">
                                    <input class="form-control" type="number" value="<?php echo $this->scope["actualChildren"];?>" id="actual_children" name="actual_children" max="6" data-val-max="Minimum 6 children should present" <?php echo $this->scope["disabledChildren"];?>>
                                </div>
                                <div>
                               <span class="text-danger field-validation-valid" data-valmsg-for="actual_children" data-valmsg-replace="true"></span>
                               </div>
                            </div>
                            <div class="form-group">
                                <label for="check_in_single" class="col-md-3 control-label">Check In</label>
                                <div class="col-md-3">
                                    <input name="check_in_single" class="form-control" id="check_in_single" type="text" value="<?php echo $this->scope["actualCheckIn"];?>" data-val="true" data-val-required="The Check In field is required." <?php echo $this->scope["requiredCheckIn"];?> <?php echo $this->scope["disabledCheckIn"];?>/>
                                </div>
                                <div class="d-block">
                                <span class="text-danger field-validation-valid" data-valmsg-for="check_in_single" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="check_out_single" class="col-md-3 control-label">Check Out</label>
                                <div class="col-md-3">
                                    <input name="check_out_single" data-val="true" data-val-required="The Check Out field is required." class="form-control" id="check_out_single" type="text" value="<?php echo $this->scope["actualCheckOut"];?>" <?php echo $this->scope["requiredCheckOut"];?> <?php echo $this->scope["disabledCheckOut"];?>/>
                                </div>
                                  <div class="d-block">
                                <span class="text-danger field-validation-valid" data-valmsg-for="check_out_single" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label for="actualStayNights" class="col-md-3 control-label">Actual Night Stay(s)</label>
                                <div class="col-md-3">
                                    <input class="form-control" type="number" id="actualStayNights" name="actualStayNights" value="<?php echo $this->scope["actualNightStays"];?>" <?php echo $this->scope["disabled"];?>>
                                </div>
                            </div>
                            <hr>

                            <?php if ((isset($this->scope["visibleOnCheckIn"]) ? $this->scope["visibleOnCheckIn"] : null)) {
?>

                                <div class="form-group">
                                    <label for="room_no" class="col-md-3 control-label">Room No.</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="room_no" id="room_no" data-val="true" data-val-required="The Room No. field is required.">

                                        <?php 
$_fh0_data = (isset($this->scope["roomList"]) ? $this->scope["roomList"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['row'])
	{
/* -- foreach start output */
?>
                                            <option value="<?php echo $this->scope["row"]["room_no"];?>"><?php echo $this->scope["row"]["door_no"];?></option>
                                        <?php 
/* -- foreach end output */
	}
}?>

                                        </select>
                                       
                                    </div>
                                    <div class="d-block">
                                <span class="text-danger field-validation-valid" data-valmsg-for="room_no" data-valmsg-replace="true"></span>
                                </div>
                                </div>
                            
                            <?php 
}
else {
?>

                                <div class="form-group">
                                    <label for="door_no_x" class="col-md-3 control-label">Room No.</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" id="door_no_x" name="door_no_x" value="<?php echo $this->scope["doorNo"];?>" readonly>
                                    </div>
                                </div>

                            <?php 
}?>

                            <hr>
                            <div class="form-group">
                                <label for="<?php echo $this->scope["disabled"];?>" class="col-md-3 control-label">Total Payable</label>
                                <div class="col-md-3">
                                    <input class="form-control text-right" type="text" value="<?php echo $this->scope["totalPayable"];?>" data-val="false" id="total-payable" name="total-payable" <?php echo $this->scope["disabled"];?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="additional-charges" class="col-md-3 control-label">Additional Charges</label>
                                <div class="col-md-3">
                                    <input class="form-control text-right" type="text" value="<?php echo $this->scope["additionalCharges"];?>" data-val="false" id="additional-charges" name="additional-charges" <?php echo $this->scope["disabledAdditionalCharges"];?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="balance-amount" class="col-md-3 control-label"><?php echo $this->scope["balanceAmountLabel"];?></label>
                                <div class="col-md-3">
                                    <input class="form-control text-right" type="text" value="<?php echo $this->scope["balanceAmount"];?>" data-val="false" id="balance-amount" name="balance-amount" <?php echo $this->scope["disabled"];?>>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-md-3 col-md-offset-3">
                                    <input type="submit" name="action" value="<?php echo $this->scope["checkActionButton"];?>" class="btn btn-block btn-info" />
                                </div>

                                <?php if ((isset($this->scope["cancelled"]) ? $this->scope["cancelled"] : null)) {
?>

                                    <div class="col-md-3">
                                        <input type="submit" name="action" value="Cancel" class="btn btn-block btn-danger" formnovalidate/>
                                    </div>
                               
                                <?php 
}?>

                            </div>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row block col-md-4" style="margin-left:20px">
    <div class="col-md-12 text-center clear-padding">
        <div class="header"><h4>BOOKING SUMMARY</h4></div>
        <div class="body">
            <table class="margin-offset-1 text-left">
                <tr>
                <td class="label-1" style="width: 200px">Booked Date: </td>
                <td class="label-1-sub"><?php echo $this->scope["requestedDate"];?></td>
                </tr>
            </table>
            <hr class="featurette-divider">
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
                    <td id="roomRate" class="label-1-sub"><?php echo $this->scope["roomRate"];?></td>
                </tr>
            </table>
            <hr class="featurette-divider">
            <table class="margin-offset-1 text-left">
                <tr>
                    <td class="label-1 font-weight-bold" style="width: 200px">Total Amount: </td>
                    <td class="label-1-sub font-weight-bold text-right"><?php echo $this->scope["totalAmount"];?></td>
                </tr>
                <tr>
                    <td class="label-1" style="width: 200px">Amount Paid: </td>
                    <td class="label-1-sub text-right"><?php echo $this->scope["minPayable"];?></td>
                </tr>
                <!-- <tr>
                    <td class="label-1" style="width: 200px">Balance To be Paid: </td>
                    <td class="label-1-sub text-right"><?php echo $this->scope["balanceToBePaid"];?></td>
                </tr> -->
            </table>

        </div>
    </div>
    <div class="col-md-8">

    </div>
</div>



<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>