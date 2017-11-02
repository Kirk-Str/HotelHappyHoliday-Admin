<?php

    require '..\vendor\autoload.php';

?>

<div>
    <h3>Pre-Reserved Rooms</h3>
</div>

<table id="reservation-list" class="table table-hover">
    <thead>
        <tr>
            <th></th>
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
        if($rows){
            foreach($rows as $row){  
                echo "<tr>";

                    echo '<td id="' . $row->id . '"></td>';
                    echo '<td><a href="./confirmation.php?requestId=' . $row->id . '">'  . $row->id . '</a></td>';
                    echo "<td>" . $row->firstname . ' ' . $row->lastname  . "</td>";
                    echo "<td>" . $row->room_name . "</td>";
                    echo "<td>" . $row->adults . "</td>";
                    echo "<td>" . $row->children . "</td>";
                    echo "<td>" . $row->check_in . "</td>";
                    echo "<td>" . $row->check_out . "</td>";
                    echo "<td>" . $row->nightstays . "</td>";

                echo "</tr>";
            }
        }
?>

</table>