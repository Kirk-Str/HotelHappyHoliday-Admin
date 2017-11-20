<?php

    require '..\vendor\autoload.php';

?>

<div>
    <h3>OFFERS</h3>
</div>
<hr>

<div class="form-group">
    <form action="offerdetail.php?type=add" method="POST">
        <input type="submit" value="Add New"  class="btn btn-info" />
    </form>
</div>

<table id="offer-list" class="table table-hover">

    <thead>
        <tr>
            <th>Id</th>
            <th>Offer</th>
            <th>Thumbnail</th>
            <th>Caption</th>
            <th>Description</th>
            <th>Rate</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    
    {foreach $offersList row}

        <tr>
    
            <td id="{$row.offer_id}"><a href="./offerdetail.php?type=edit&offerId={$row.offer_id}">{$row.offer_id}</a></td>
            <td>{$row.offer_name}</td>
            <td>{if $row.thumbnail != ""}<img height="80" width="80" src="data:image;base64,{$row.thumbnail}"{/if}</td>
            <td>{$row.caption}</td>
            <td>{$row.description}</td>
            <td>{$row.rate}</td>
            <td><a href="./offerdetail.php?type=delete&offerId={$row.offer_id}">Delete</a></td>

        </tr>
    
    {/foreach}
       
</table>
