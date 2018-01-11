<div>
    <h3>CONFIRM RESERVATION</h3>
</div>

<div class="row block {$inputBlockStyle} col-md-7">
    <div class="col-md-12  text-center clear-padding">
        <div class="header {$inputHeaderStyle}"><h4>{$formHeader}</h4></div>
        <div class="body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="./actions/confirmation.php?requestId={$reservationId}" novalidate="novalidate">
                        <input type="hidden" name="type" id="type" value="{$type}" />
                        <div class="form-horizontal">
                            <div class="text-danger validation-summary-valid" data-valmsg-summary="true">
                                <ul>
                                    <li style="display:none"></li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="email_id" class="col-md-3 control-label">Reservation Id</label>
                                <div class="col-md-2">
                                    <input class="form-control" type="text" value="{$reservationId}" id="reservation_id" name="reservation_id" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="col-md-3 control-label">Firstname</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$firstname}" id="firstname" name="firstname" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="lastname" class="col-md-3 control-label">Lastname</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$lastname}" id="lastname" name="lastname" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="actual_adults" class="col-md-3 control-label">Adults</label>
                                <div class="col-md-2">
                                    <input class="form-control" type="text" value="{$actualAdults}" id="actual_adults" name="actual_adults" {$disabledAdults}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="actual_children" class="col-md-3 control-label">Children</label>
                                <div class="col-md-2">
                                    <input class="form-control" type="text" value="{$actualChildren}" id="actual_children" name="actual_children" {$disabledChildren}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="check_in_single" class="col-md-3 control-label">Check In</label>
                                <div class="col-md-3">
                                    <input name="check_in_single" class="form-control" id="check_in_single" type="text" value="{$actualCheckIn}" data-val="true" data-val-required="The Check In field is required." {$requiredCheckIn} {$disabledCheckIn}/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="check_out_single" class="col-md-3 control-label">Check Out</label>
                                <div class="col-md-3">
                                    <input name="check_out_single" data-val="true" data-val-required="The Check Out field is required." class="form-control" id="check_out_single" type="text" value="{$actualCheckOut}" {$requiredCheckOut} {$disabledCheckOut}/>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label for="actualStayNights" class="col-md-3 control-label">Actual Night Stay(s)</label>
                                <div class="col-md-3">
                                    <input class="form-control" type="number" id="actualStayNights" name="actualStayNights" value="{$actualNightStays}" {$disabled}>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="{$disabled}" class="col-md-3 control-label">Total Payable</label>
                                <div class="col-md-3">
                                    <input class="form-control text-right" type="text" value="{$totalPayable}" data-val="false" id="total-payable" name="total-payable" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="additional-charges" class="col-md-3 control-label">Additional Charges</label>
                                <div class="col-md-3">
                                    <input class="form-control text-right" type="text" value="{$additionalCharges}" data-val="false" id="additional-charges" name="additional-charges" {$disabledAdditionalCharges}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="balance-amount" class="col-md-3 control-label">{$balanceAmountLabel}</label>
                                <div class="col-md-3">
                                    <input class="form-control text-right" type="text" value="{$balanceAmount}" data-val="false" id="balance-amount" name="balance-amount" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-md-3 col-md-offset-3">
                                    <input type="submit" name="action" value="{$checkActionButton}" class="btn btn-block btn-info" />
                                </div>

                                {if $cancelled }

                                    <div class="col-md-3">
                                        <input type="submit" name="action" value="Cancel" class="btn btn-block btn-danger" formnovalidate/>
                                    </div>
                               
                                {/if}

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
                <td class="label-1-sub">{$requestedDate}</td>
                </tr>
            </table>
            <hr class="featurette-divider">
            <table class="margin-offset-1 text-left">
                <tr>
                    <td class="label-1" style="width: 200px">Check In: </td>
                    <td class="label-1-sub">{$checkIn}</td>
                </tr>
                <tr>
                    <td class="label-1">Check Out: </td>
                    <td class="label-1-sub">{$checkOut}</td>
                </tr>
                <tr>
                    <td class="label-1">Night Stay(s):</td>
                    <td class="label-1-sub">{$nightStay}</td>
                </tr>
                <tr>
                    <td class="label-1">Adults:</td>
                    <td class="label-1-sub">{$adults}</td>
                </tr>
                <tr>
                    <td class="label-1">Children:</td>
                    <td class="label-1-sub">{$children}</td>
                </tr>
            </table>
            <hr class="featurette-divider">
            <table class="margin-offset-1 text-left">
                <tr>
                    <td class="label-1" style="width: 200px">Room Selected: </td>
                    <td class="label-1-sub">{$roomSelected}</td>
                </tr>
                <tr>
                    <td class="label-1" style="width: 200px">Rate per Night: </td>
                    <td id="roomRate" class="label-1-sub">{$roomRate}</td>
                </tr>
            </table>
            <hr class="featurette-divider">
            <table class="margin-offset-1 text-left">
                <tr>
                    <td class="label-1 font-weight-bold" style="width: 200px">Total Amount: </td>
                    <td class="label-1-sub font-weight-bold text-right">{$totalAmount}</td>
                </tr>
                <tr>
                    <td class="label-1" style="width: 200px">Amount Paid: </td>
                    <td class="label-1-sub text-right">{$minPayable}</td>
                </tr>
                <!-- <tr>
                    <td class="label-1" style="width: 200px">Balance To be Paid: </td>
                    <td class="label-1-sub text-right">{$balanceToBePaid}</td>
                </tr> -->
            </table>

        </div>
    </div>
    <div class="col-md-8">

    </div>
</div>



