<div>
    <h3>ROOM OVERVIEW</h3>
</div>
<hr> 
<div class="form-group">
    <form action="roomAllocation.php?type=add" method="POST">
        <input type="submit" value="Add New"  class="btn btn-info" />
    </form>
</div>
<div id="room-overview" class="flex-row row">

  {foreach $roomAllocationRow row}

    <div class="col-xs-2 col-sm-2 col-md-2 clear-padding">
      
      <input type="hidden" name="room_no" value="={$row.room_no}" >
      <input type="hidden" name="room_id" value="={$row.room_id}" >

        <div class="thumbnail">

          <a href="./roomAllocation.php?type=edit&roomNo={$row.room_no}&roomId={$row.room_id}" class="close pull-left">
            <span class="glyphicon glyphicon-edit"></span>
          </a>
          
          <a href="./roomAllocation.php?type=delete&roomNo={$row.room_no}&roomId={$row.room_id}" class="close pull-left">
            <span class="glyphicon glyphicon-remove"></span>
          </a>

          {if $row.room_status == 1}
            <span class="label label-default pull-right">
              Vacant
            </span>
          {elseif $row.room_status == 2}
            <span class="label label-success pull-right">
              Occupied
            </span>
          {else}
            <span class="label label-warning pull-right">
              Dirty
            </span>
          {/if}
          <div class="caption clear-padding">

            {if $row.reservation_id != NULL}

              <a href="./roomSwapping.php?reservationId={$row.reservation_id}">
                <h3 class="text-center">
                  {$row.door_no}
                </h3>
              </a>

            {else}

              <h3 class="text-center">
                  {$row.door_no}
              </h3>

            {/if}
            
          </div>
          <p class="lead text-center">{truncate $row.room_type 18 }</p>
        </div>
      
    </div>

  {/foreach}

</div>