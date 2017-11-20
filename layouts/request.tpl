<div>
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
                    <td class="label-1-sub">{$offerCaption}</td>
                </tr>
            </table>
            <hr class="featurette-divider">
            <table class="margin-offset-1 text-left">
                <tr>
                    <td class="label-1" style="width: 140px">Rate per Guest: </td>
                    <td class="label-1-sub">{$rate}</td>
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
                    <form method="POST" action="./actions/request.php">
                        <input type="hidden" value="{$requestId}" name="request-id" id="request-id">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="request-id" class="col-md-3 control-label">Request Id</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="request-id" name="request-id" value="{$requestId}" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="requested-date" class="col-md-3 control-label">Requested Date</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="requested-date" name="requested-date" value="{$requestedTimestamp}" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="start-at" class="col-md-3 control-label">Start At</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="start-at" name="start-at" value="{$startAt}" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="end-at" class="col-md-3 control-label">End At
                                </label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="end-at" name="end-at" value="{$endAt}" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="guests" class="col-md-3 control-label">Guests</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" value="{$guests}" id="guests" name="guests" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="note" class="col-md-3 control-label">Addtional Request / Note</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" type="text" rows="6" id="note" name="note" {$disabled}>{$note}</textarea>
                                </div>
                            </div>

                            <hr class="featurette-divider">

                            <div class="form-group">
                                <label for="note" class="col-md-3 control-label">Approval Status</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$approvalStatus}" id="approval-status" name="approval-status" {$disabled}>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="note" class="col-md-3 control-label">Approved Date </label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$approvalTimestamp}" id="approval-date" name="approval-date" {$disabled}>
                                </div>
                            </div>

                            <div class="form-group">


                                {if $approvalStatus == 'New Request' }
                                <div class="col-md-3 col-md-offset-3">
                                    <input type="submit" name="action" value="Accept" class="btn btn-block btn-success" />
                                </div>

                                <div class="col-md-3 ">
                                    <input type="submit" name="action" value="Decline" class="btn btn-block btn-danger" />
                                </div>
                                {else}
                                <div class="col-md-3 col-md-offset-3">
                                    <input type="submit" name="action" value="Ok" class="btn btn-block btn-info" />
                                </div>
                                {/if}

                            </div>
                            <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">

    </div>
</div>