<div>
    <h3>{$pageTitle}</h3>
</div>

<div class="row">
    <div class="col-md-10">
        <form method="POST" action="<?php echo Config::get('application_path') .'admin/actions/roomTypeDetail.php'?>" enctype="multipart/form-data">
            <input type="hidden" name="type" value="{$request_type}">
            <input type="hidden" name="id" value="{$id}">
            <div class="form-horizontal">
                <hr>
                <div class="text-danger validation-summary-valid" data-valmsg-summary="true">
                    <ul>
                        <li style="display:none"></li>
                    </ul>
                </div>
                <div class="form-group">
                    <label for="room_name" class="col-md-2 control-label">Room Name</label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" data-val="true" data-val-required="The Room Name field is required." id="room_name"
                            name="room_name" value="{$room_name}">
                        <span class="text-danger field-validation-valid" data-valmsg-for="room_name" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="caption" class="col-md-2 control-label">Caption</label>
                    <div class="col-md-4">
                        <textarea class="form-control" type="text" rows="3" id="caption" data-val-required="The Caption field is required." name="caption">{$caption}</textarea>
                        <span class="text-danger field-validation-valid" data-valmsg-for="caption" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-md-2 control-label">Description</label>
                    <div class="col-md-4">
                        <textarea class="form-control" type="text" rows="6" id="description" name="description">{$description}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="total_room" class="col-md-2 control-label">Total Room</label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" data-val="true" data-val-required="The Total Room field is required." id="total_room"
                            name="total_room" value="{$total_room}">
                        <span class="text-danger field-validation-valid" data-valmsg-for="total_room" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="occupancy" class="col-md-2 control-label">Occupancy</label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" data-val="true" data-val-required="The Occupancy field is required." id="occupancy"
                            name="occupancy" value="{$occupancy}">
                        <span class="text-danger field-validation-valid" data-valmsg-for="occupancy" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="size" class="col-md-2 control-label">Size</label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" data-val="false" data-val-required="The Size field is required." id="size" name="size"
                            value="{$size}">
                        <span class="text-danger field-validation-valid" data-valmsg-for="size" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rate" class="col-md-2 control-label">Rate</label>
                    <div class="col-md-4">
                        <input class="form-control" type="number" data-val="true" data-val-required="The Rate field is required." id="rate" name="rate"
                            value="{$rate}">
                        <span class="text-danger field-validation-valid" data-valmsg-for="rate" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="room-image" class="col-md-2 control-label">Thumbnail</label>
                    <div class="col-md-4">
                        <input class="form-control-file" type="file" data-val="false" data-val-required="Image field is required." id="room-image" name="room-image" accept=".jpg, .jpeg, .png">
                        <span class="text-danger field-validation-valid" data-valmsg-for="room-image" data-valmsg-replace="true"></span>
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