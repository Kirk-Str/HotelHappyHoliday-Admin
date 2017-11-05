<div>
    <h3>RESERVATION DETAIL</h3>
</div>

<div class="row block col-md-7">
    <div class="col-md-12  text-center clear-padding">
        <div class="header"><h4>CHECK-IN AND CHECK-OUT</h4></div>
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
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$reservationId}" id="reservation-id" name="reservation-id" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email_id" class="col-md-3 control-label">Booked Date:</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$requestedDate}" id="requested-date" name="requested-date" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="room" class="col-md-3 control-label">Room Booked</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$room}" id="room" name="room" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="adults" class="col-md-3 control-label">Adults</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$adults}" id="adults" name="adults" {$disabledAdults}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="children" class="col-md-3 control-label">Children</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$children}" id="actual_children" name="children" {$disabledChildren}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="check_in" class="col-md-3 control-label">Check In</label>
                                <div class="col-md-6">
                                    <input name="check_in" class="form-control" id="check_in" type="text" value="{$checkIn}" {$disabledCheckIn}/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="check_out" class="col-md-3 control-label">Check Out</label>
                                <div class="col-md-6">
                                    <input name="check_out" class="form-control" id="check_out" type="text" value="{$CheckOut}" {$disabledCheckOut}/>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label for="stayNights" class="col-md-3 control-label">Night Stay(s)</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="stayNights" name="stayNights" value="{$nightStays}" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="balance-amount" class="col-md-3 control-label">{$balanceAmountLabel}</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$balanceAmount}" data-val="false" id="balance-amount" name="balance-amount" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-3">
                                    <input type="submit" class="btn btn-block btn-submit" value="{$checkActionButton}" />
                                </div>
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
                    <td class="label-1-sub font-weight-bold">{$totalAmount}</td>
                </tr>
                <tr>
                    <td class="label-1" style="width: 200px">Amount Paid: </td>
                    <td class="label-1-sub">{$minPayable}</td>
                </tr>
                <tr>
                    <td class="label-1" style="width: 200px">Balance To be Paid: </td>
                    <td class="label-1-sub">{$balanceToBePaid}</td>
                </tr>
            </table>

        </div>
    </div>
    <div class="col-md-8">

    </div>
</div>



