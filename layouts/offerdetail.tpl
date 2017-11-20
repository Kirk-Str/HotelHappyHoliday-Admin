<div>
    <h3>{$pageTitle}</h3>
</div>

<div class="row">
    <div class="col-md-12">
        <form method="POST" action="<?php echo Config::get('application_path') .'admin/actions/offerdetail.php'?>" enctype="multipart/form-data">
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
                    <label for="offer_name" class="col-md-2 control-label">Offer</label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" data-val="true" data-val-required="The Offer field is required." id="offer_name"
                            name="offer_name" value="{$offer_name}">
                        <span class="text-danger field-validation-valid" data-valmsg-for="offer_name" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="caption" class="col-md-2 control-label">Caption</label>
                    <div class="col-md-4">
                        <textarea class="form-control" type="text" data-val="true" rows="3" id="caption" data-val-required="The Caption field is required." name="caption">{$caption}</textarea>
                        <span class="text-danger field-validation-valid" data-valmsg-for="caption" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-md-2 control-label">Description</label>
                    <div class="col-md-4">
                        <textarea class="form-control" type="text" data-val="true" rows="6" id="description" data-val-required="The Description field is required." name="description">{$description}</textarea>
                        <span class="text-danger field-validation-valid" data-valmsg-for="description" data-valmsg-replace="true"></span>
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
                    <label for="thumbnail" class="col-md-2 control-label">Thumbnail</label>
                    <div class="col-md-4">
                        <input class="form-control-file" type="file" data-val="false" data-val-required="Thumbnail field is required." id="thumbnail" name="thumbnail" accept=".jpg, .jpeg, .png">
                        <span class="text-danger field-validation-valid" data-valmsg-for="thumbnail" data-valmsg-replace="true"></span>
                    </div>
                </div>
                <div class="form-group">
                        <div class="col-md-2 col-md-offset-2">
                            <input type="submit" value="{$buttonName}" class="btn btn-block btn-info" />
                        </div>
                    </div>
                <input type="hidden" name="token" value="<?php echo Token::generate();?>">
            </div>
        </form>
    </div>
</div>