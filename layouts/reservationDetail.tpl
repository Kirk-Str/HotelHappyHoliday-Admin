﻿<div>
    <h3>RESERVATION DETAIL</h3>
</div>
<div class="row">
    <div class="col-md-10">
        <form method="POST" action="./actions/register.php" novalidate="novalidate">
            <div class="form-horizontal">
                <hr>
                <div class="text-danger validation-summary-valid" data-valmsg-summary="true">
                    <ul>
                        <li style="display:none"></li>
                    </ul>
                </div>
                <div class="form-group">
                    <label for="reservation_id" class="col-md-2 control-label">Reservation Id:</label>
                    <div class="col-md-10">
                        <label for="reservation_id" class="col-md-10 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="reserved_room" class="col-md-2 control-label">Room:</label>
                    <div class="col-md-8">
                        <label for="reserved_room" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="adults" class="col-md-2 control-label">Adults:</label>
                    <div class="col-md-8">
                        <label for="adults" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="children" class="col-md-2 control-label">Children:</label>
                    <div class="col-md-8">
                        <label for="children" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="check_in" class="col-md-2 control-label">Check In:</label>
                    <div class="col-md-8">
                        <label for="check_in" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="check_out" class="col-md-2 control-label">Check Out:</label>
                    <div class="col-md-8">
                        <label for="check_out" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="special_request" class="col-md-2 control-label">Special Request:</label>
                    <div class="col-md-8">
                        <label for="special_request" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="total_amount" class="col-md-2 control-label">Total Amount:</label>
                    <div class="col-md-8">
                        <label for="total_rent" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="amount_received" class="col-md-2 control-label">Amount Received:</label>
                    <div class="col-md-8">
                        <label for="amount_received" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="amount_balance" class="col-md-2 control-label">Balance:</label>
                    <div class="col-md-8">
                        <label for="amount_balance" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="reservation_date" class="col-md-2 control-label">Reserved Date:</label>
                    <div class="col-md-8">
                        <label for="reservation_date" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-4">
                        <input type="submit" value="Edit" class="btn btn-info" />
                    </div>
                </div>
                <input type="hidden" name="token" value="<?php echo Token::generate();?>">
            </div>
        </form>
    </div>
</div>

<div>
    <h3>Guest Information</h3>
</div>
<div class="row">
    <div class="col-md-10">
        <form method="POST" action="./actions/register.php" novalidate="novalidate">
            <div class="form-horizontal">
                <hr>
                <div class="text-danger validation-summary-valid" data-valmsg-summary="true">
                    <ul>
                        <li style="display:none"></li>
                    </ul>
                </div>
                <div class="form-group">
                    <label for="email_id" class="col-md-2 control-label">Email:</label>
                    <div class="col-md-10">
                        <label for="email_id" class="col-md-10 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-md-2 control-label">Firstname:</label>
                    <div class="col-md-8">
                        <label for="firstname" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-md-2 control-label">Lastname:</label>
                    <div class="col-md-8">
                        <label for="lastname" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address_line_one" class="col-md-2 control-label">Address 1:</label>
                    <div class="col-md-8">
                        <label for="address_line_one" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address_line_two" class="col-md-2 control-label">Address 2:</label>
                    <div class="col-md-8">
                        <label for="address_line_two" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-md-2 control-label">City:</label>
                    <div class="col-md-8">
                        <label for="city" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-md-2 control-label">Country:</label>
                    <div class="col-md-8">
                        <label for="country" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact_no" class="col-md-2 control-label">Contact No:</label>
                    <div class="col-md-8">
                        <label for="contact_no" class="col-md-6 control-label text-left">Emailgdsdfgsdf fgd dfgs ertwertewrt dffg</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-4">
                        <input type="submit" value="Edit" class="btn btn-info" />
                    </div>
                </div>
                <input type="hidden" name="token" value="<?php echo Token::generate();?>">
            </div>
        </form>
    </div>
</div>
