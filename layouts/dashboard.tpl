<?php

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
                    {$newBookings}
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
                    {$newOccupiedReservation}
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
                    {$newRequests}
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



<h3>{$dashboardFor}</h3>

{if $dashboardFor != 'New Offer Reqests'}

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
        {foreach $reservationList row}
        
            
        
            <tr>

                <td id="{$row.reservation_id}"><a href="./confirmation.php?requestId={$row.reservation_id}">{$row.reservation_id}</a></td>
                <td>{$row.firstname} {$row.lastname}</td>
                <td>{$row.room_name}</td>
                <td>{$row.adults}</td>
                <td>{$row.children}</td>
                <td>{$row.check_in}</td>
                <td>{$row.check_out}</td>
                <td>{$row.nightstays}</td>

            </tr>
            
        {/foreach}
        </tbody>
    </table>

{else}

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

    {foreach $offerList row}

        <tr>

            <td id="{$row.id}"><a href="./request.php?requestId={$row.id}">{$row.id}</a></td>
            <td>{$row.firstname} {$row.lastname}</td>
            <td>{$row.offer_name}</td>
            <td>{$row.event_start_date}</td>
            <td>{$row.event_end_date}</td>
            <td>{$row.guests}</td>
            <td>{if $row.approval_status == null}New Request{elseif $row.approval_status == 1}Accepted{else}Declined{/if}</td>

        </tr>

    {/foreach}

    </table>

{/if}