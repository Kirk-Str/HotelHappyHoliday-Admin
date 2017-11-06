<div>
    <h3>RESERVATION DETAIL</h3>
</div>

<div class="row block col-md-7">
    <div class="col-md-12  text-center clear-padding">
        <div class="header">
            <h4>CHECK-IN AND CHECK-OUT</h4>
        </div>
        <div class="body">
            <div class="row">
                <div class="col-md-12">
                    <!-- <form method="POST" action="" novalidate="novalidate"> -->
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
                                    <input class="form-control" type="text" value="{$roomSelected}" id="room" name="room" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="adults" class="col-md-3 control-label">Adults</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$adults}" id="adults" name="adults" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="children" class="col-md-3 control-label">Children</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$children}" id="actual_children" name="children" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="check_in" class="col-md-3 control-label">Check In</label>
                                <div class="col-md-6">
                                    <input name="check_in" class="form-control" id="check_in" type="text" value="{$checkIn}" {$disabled}/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="check_out" class="col-md-3 control-label">Check Out</label>
                                <div class="col-md-6">
                                    <input name="check_out" class="form-control" id="check_out" type="text" value="{$checkOut}" {$disabled}/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stayNights" class="col-md-3 control-label">Night Stay(s)</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="stayNights" name="stayNights" value="{$nightStays}" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="total-amount" class="col-md-3 control-label">Total Amount</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$totalAmount}" data-val="false" id="total-amount" name="total-amount" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paid-amount" class="col-md-3 control-label">Advance Paid</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$advancePaid}" data-val="false" id="paid-amount" name="paid-amount" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="balance-amount" class="col-md-3 control-label">Balance to be paid</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$balanceToBePaid}" data-val="false" id="balance-amount" name="balance-amount"
                                        {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-3">
                                <a href="./myReservations.php?type=opt-filter-new" class="btn btn-block btn-submit">Ok</a>
                                    <!-- <input type="submit" class="btn btn-block btn-submit"  value="{$checkActionButton}" /> -->
                                </div>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>