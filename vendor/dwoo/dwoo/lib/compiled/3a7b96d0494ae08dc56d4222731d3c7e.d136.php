<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div>
    <h3>OFFER REQUEST</h3>
</div>
<div class="row block col-md-4 col-sm-1" style="margin-right:20px">
    <div class="col-md-12 text-center clear-padding">
        <div class="header">
            <h4>OFFER SUMMARY</h4>
        </div>
        <div class="body">
            <table class="margin-offset-1 text-left">
                <tr>
                    <td class="label-1" style="width: 140px">Offer: </td>
                    <td class="label-1-sub"><?php echo $this->scope["offer_caption"];?></td>
                </tr>
            </table>
            <hr class="featurette-divider">
            <table class="margin-offset-1 text-left">
                <tr>
                    <td class="label-1" style="width: 140px">Rate per Guest: </td>
                    <td class="label-1-sub"><?php echo $this->scope["rate_per_guest"];?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="row block col-md-7">
    <div class="col-md-12  text-center clear-padding">
        <div class="header">
            <h4>REQUEST DETAILS</h4>
        </div>
        <div class="body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="./actions/offerRequest.php?type=add">
                        <input type="hidden" value="<?php echo $this->scope["offer_id"];?>" name="offer_id">
                        <div class="form-horizontal">
                            <div class="text-danger validation-summary-valid" data-valmsg-summary="true">
                                <ul>
                                    <li style="display:none"></li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="event_start_date" class="col-md-3 control-label">Start At
                                    <span class="validation">*</span>
                                </label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" data-val="true" data-val-required="The Start At field is required." id="event_start_date"
                                        name="event_date_range" value="<?php echo $this->scope["start_at"];?>" <?php echo $this->scope["disabled"];?> required>
                                    <input type="hidden" name="event_start_date_h" id="event_start_date_h" value="" />
                                    <span class="text-danger field-validation-valid" data-valmsg-for="event_start_date" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="event_end_date" class="col-md-3 control-label">End At
                                    <span class="validation">*</span>
                                </label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="<?php echo $this->scope["end_at"];?>" data-val="true" data-val-required="The End At field is required."
                                        id="event_end_date" name="event_date_range" <?php echo $this->scope["disabled"];?> required>
                                    <input type="hidden" name="event_end_date_h" id="event_end_date_h" value="" />
                                    <span class="text-danger field-validation-valid" data-valmsg-for="event_end_date" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="guests" class="col-md-3 control-label">Guests
                                    <span class="validation">*</span>
                                </label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" value="<?php echo $this->scope["guests"];?>" data-val="true" data-val-required="The Guests field is required."
                                        id="guests" name="guests" <?php echo $this->scope["disabled"];?>>
                                    <span class="text-danger field-validation-valid" data-valmsg-for="guests" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="note" class="col-md-3 control-label">Addtional Request / Note</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" type="text" rows="2" data-val="false" data-val-required="The Addtional Request / Note field is required."
                                        id="note" name="note" <?php echo $this->scope["disabled"];?>><?php echo $this->scope["note"];?></textarea>
                                    <span class="text-danger field-validation-valid" data-valmsg-for="address" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <input type="submit" value="<?php echo $this->scope["buttonName"];?>" class="btn btn-info" />
                                </div>
                            </div>
                            <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>