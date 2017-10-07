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
                    2
                </h3>
                <p>
                    New Booking in Last 7 days
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>                                <a href="#" onclick="more1();" class="small-box-footer">
                View Details <i class="fa fa-arrow-circle-right"></i>
            </a>

        </div>
    </div>					<div class="col-xs-4">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    5
                </h3>
                <p>
                    Booking with Pending Payment
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>                                <a href="#" onclick="more2();" class="small-box-footer">
                View Details <i class="fa fa-arrow-circle-right"></i>
            </a>

        </div>
    </div>					<div class="col-xs-4">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    3
                </h3>
                <p>
                    Paid Booking
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



<h3>Occupied Rooms</h3>
<table class="table table-hover">
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
<?php 
        $room = new Reservation();

        $rows = $room->listRequests();

        foreach($rows as $row){  
            echo "<tr>";

                echo "<td>" . $row->id . "</td>";
                echo "<td>" . $row->firstname . ' ' . $row->lastname  . "</td>";
                echo "<td>" . $row->room_name . "</td>";
                echo "<td>" . $row->adults . "</td>";
                echo "<td>" . $row->children . "</td>";
                echo "<td>" . $row->check_in . "</td>";
                echo "<td>" . $row->check_out . "</td>";
                echo "<td>" . $row->nightstays . "</td>";

            echo "</tr>";
        }
?>

</table>