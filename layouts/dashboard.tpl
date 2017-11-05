<?php

    require '..\vendor\autoload.php';

?>

<div>
    <h3>DASHBOARD</h3>
</div>

<div class="row">
    <div class="col-xs-4">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    {$newBookings}
                </h3>
                <p>
                    New Bookings
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>                                
            <a href="<?php echo $_SERVER["PHP_SELF"] . '?dashboard=new'; ?>" class="small-box-footer">
                View Details <i class="fa fa-arrow-circle-right"></i>
            </a>

        </div>
    </div>					<div class="col-xs-4">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    {$newOccupiedReservation}
                </h3>
                <p>
                    Currently Occupied 
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div> 
            <a href="<?php echo $_SERVER["PHP_SELF"] . '?dashboard=occupied'; ?>" class="small-box-footer">
                View Details <i class="fa fa-arrow-circle-right"></i>
            </a>

        </div>
    </div>					<div class="col-xs-4">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    {$newOffers}
                </h3>
                <p>
                    Offers
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>                                <a href="#" onclick="more3();" class="small-box-footer">
                View Details <i class="fa fa-arrow-circle-right"></i>
            </a>

        </div>
    </div>
</div>



<h3>{$dashboardFor}</h3>
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
        
{foreach $reservationList row}

    <tr>

        <td id="{$row.id}"><a href="./confirmation.php?requestId={$row.id}">{$row.id}</a></td>
        <td>{$row.firstname} {$row.lastname}</td>
        <td>{$row.room_name}</td>
        <td>{$row.adults}</td>
        <td>{$row.children}</td>
        <td>{$row.check_in}</td>
        <td>{$row.check_out}</td>
        <td>{$row.nightstays}</td>

    </tr>

{/foreach}

</table>