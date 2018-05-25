<div>
    <h3>{$pageTitle}</h3>
</div>

<div class="row">
    <div class="col-md-10">
        <form method="POST" action="<?php echo Config::get('application_path') .'admin/actions/roomAllocation.php'?>">
            <input type="hidden" name="type" value="{$request_type}">
            <input type="hidden" name="id" value="{$id}">
            <div class="form-horizontal">
                <hr>
                <div class="text-danger validation-summary-valid" data-valmsg-summary="true">
                    <ul>
                        <li style="display:none"></li>
                    </ul>
                </div>

                {if $request_type == 'add'}

                <div class="form-group">
                    <label for="room_name" class="col-md-2 control-label">Room Type</label>
                    <div class="col-md-4">
                        <select class="form-control" name="room_id" id="room_id" data-val="true" data-val-required="The Room Category field is required.">
                            
                            {foreach $roomTypeList row}
                                <option value="{$row.room_id}">{$row.room_name}</option>
                            {/foreach}
                            
                        </select>
                        <span class="text-danger field-validation-valid" data-valmsg-for="room_id" data-valmsg-replace="true"></span>
                    </div>
                </div>

                {else}

                    <div class="form-group">
                        <label for="room_name_readonly" class="col-md-2 control-label">Room Type</label>
                        <div class="col-md-4">
                        <input type="hidden" name="room_id" value="{$room_id}">
                            <input class="form-control" type="text" id="room_name_readonly" name="room_name_readonly" value="{$room_name}" readonly>
                        </div>
                    </div>

                {/if}

                <div class="form-group">
                    <label for="door_no" class="col-md-2 control-label">Room No.</label>
                    <div class="col-md-2">
                    <input class="form-control" type="text" data-val="true" data-val-required="The Room No. field is required." id="door_no"
                            name="door_no" value="{$door_no}">
                        <span class="text-danger field-validation-valid" data-valmsg-for="door_no" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="room_status" class="col-md-2 control-label">Room Status</label>
                    <div class="col-md-2">
                        <select class="form-control" name="room_status" id="room_status" data-val="true" data-val-required="The Room Status field is required.">
                            <option {$vacant} value="1">Vacant</option>
                            <option {$occupied} value="2">Occupied</option>
                            <option {$dirty} value="3">Dirty</option>
                        </select>
                        <span class="text-danger field-validation-valid" data-valmsg-for="room_status" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                        <div class="col-md-offset-2 col-md-4">
                            <input type="submit" value="{$buttonName}" class="btn btn-info" />
                        </div>
                    </div>
                <input type="hidden" name="token" value="<?php echo Token::generate();?>">
            </div>
        </form>
    </div>
</div>