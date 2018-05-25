<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><?php

//    require '..\vendor\autoload.php';

?>

<div>
    <h3>DASHBOARD</h3>
</div>

<div class="row">
    <div class="col-xs-4">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    <?php echo $this->scope["newBookings"];?>
                </h3>
                <p>
                    New Bookings
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>                                
            <a href="<?php echo $_SERVER["PHP_SELF"] . '?dashboard=opt-filter-new'; ?>" class="small-box-footer">
                View Details <i class="fa fa-arrow-circle-right"></i>
            </a>

        </div>
    </div>					<div class="col-xs-4">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    <?php echo $this->scope["newOccupiedReservation"];?>
                </h3>
                <p>
                    Currently Occupied 
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div> 
            <a href="<?php echo $_SERVER["PHP_SELF"] . '?dashboard=opt-filter-occupied'; ?>" class="small-box-footer">
                View Details <i class="fa fa-arrow-circle-right"></i>
            </a>

        </div>
    </div>					<div class="col-xs-4">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    <?php echo $this->scope["newRequests"];?>
                </h3>
                <p>
                    Offers
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo $_SERVER["PHP_SELF"] . '?dashboard=opt-filter-offers'; ?>" onclick="more3();" class="small-box-footer">View Details <i class="fa fa-arrow-circle-right"></i>
            </a>

        </div>
    </div>
</div>



<h3><?php echo $this->scope["dashboardFor"];?></h3>

<?php if ((isset($this->scope["dashboardFor"]) ? $this->scope["dashboardFor"] : null) != 'New Offer Reqests') {
?>

    <table id="reservation-list" class="table table-hover">

        <thead>
            <tr>
                <th>Reservation Id</th>
                <th>Guest's Fullname</th>
                <th>Room</th>
                <th>Adults</th>
                <th>Children</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Night Stay(s)</th>
            </tr>
        </thead>
        <tbody>
        <?php 
$_fh0_data = (isset($this->scope["reservationList"]) ? $this->scope["reservationList"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['row'])
	{
/* -- foreach start output */
?>
        
            
        
            <tr>

                <td id="<?php echo $this->scope["row"]["reservation_id"];?>"><a href="./confirmation.php?requestId=<?php echo $this->scope["row"]["reservation_id"];?>"><?php echo $this->scope["row"]["reservation_id"];?></a></td>
                <td><?php echo $this->scope["row"]["firstname"];?> <?php echo $this->scope["row"]["lastname"];?></td>
                <td><?php echo $this->scope["row"]["room_name"];?></td>
                <td><?php echo $this->scope["row"]["adults"];?></td>
                <td><?php echo $this->scope["row"]["children"];?></td>
                <td><?php echo $this->scope["row"]["check_in"];?></td>
                <td><?php echo $this->scope["row"]["check_out"];?></td>
                <td><?php echo $this->scope["row"]["nightstays"];?></td>

            </tr>
            
        <?php 
/* -- foreach end output */
	}
}?>
        </tbody>
    </table>

<?php 
}
else {
?>

    <table id="request-list" class="table table-hover">

        <thead>
            <tr>
                <th>Request Id</th>
                <th>Guest's Fullname</th>
                <th>Offer</th>
                <th>Start At</th>
                <th>End At</th>
                <th>Guests</th>
                <th>Approval Status</th>
            </tr>
        </thead>

    <?php 
$_fh1_data = (isset($this->scope["offerList"]) ? $this->scope["offerList"] : null);
if ($this->isTraversable($_fh1_data) == true)
{
	foreach ($_fh1_data as $this->scope['row'])
	{
/* -- foreach start output */
?>

        <tr>

            <td id="<?php echo $this->scope["row"]["id"];?>"><a href="./request.php?requestId=<?php echo $this->scope["row"]["id"];?>"><?php echo $this->scope["row"]["id"];?></a></td>
            <td><?php echo $this->scope["row"]["firstname"];?> <?php echo $this->scope["row"]["lastname"];?></td>
            <td><?php echo $this->scope["row"]["offer_name"];?></td>
            <td><?php echo $this->scope["row"]["event_start_date"];?></td>
            <td><?php echo $this->scope["row"]["event_end_date"];?></td>
            <td><?php echo $this->scope["row"]["guests"];?></td>
            <td><?php if ((isset($this->scope["row"]["approval_status"]) ? $this->scope["row"]["approval_status"]:null) == null) {
?>New Request<?php 
}
elseif ((isset($this->scope["row"]["approval_status"]) ? $this->scope["row"]["approval_status"]:null) == 1) {
?>Accepted<?php 
}
else {
?>Declined<?php 
}?></td>

        </tr>

    <?php 
/* -- foreach end output */
	}
}?>

    </table>

<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>