<?php

    require '..\vendor\autoload.php';

?>

<div>
    <h3>ROOMS</h3>
</div>
<hr> 
<div class="form-group">
    <form action="roomdetail.php?type=add" method="POST">
        <input type="submit" value="Add New"  class="btn btn-info" />
    </form>
</div>

<table class="table table-hover">

    <thead>
        <tr>
            <th>Room Name</th>
            <th>Thumbnail</th>
            <th>Total Rooms</th>
            <th>Occupancy</th>
            <th>Size</th>
            <th>Rate</th>
            <th>Caption</th>
            <th>Desciption</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    
<?php 

    $room = new Room();

    $rows = $room->selectAll();

    foreach($rows as $row){  
            echo "<tr>";
                echo "<td>" . $row->room_name . "</td>";
                echo "<td>" . "</td>";
                echo "<td>" . $row->total_room . "</td>";
                echo "<td>" . $row->occupancy . "</td>";
                echo "<td>" . $row->size . "</td>";
                echo "<td>" . $row->rate . "</td>";
                echo "<td>" . $row->caption . "</td>";
                echo "<td>" . $row->description . "</td>";
                echo '<td><a href="./roomdetail.php?type=edit&id=' . $row->room_id . '">Edit</a></td>';
                echo '<td><a href="./roomdetail.php?type=delete&id=' . $row->room_id . '">Delete</a></td>';
            echo "</tr>";
        }

        
?>

</table>
