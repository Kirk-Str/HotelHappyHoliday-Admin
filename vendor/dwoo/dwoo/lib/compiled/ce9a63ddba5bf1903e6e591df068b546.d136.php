<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><table width="500" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff">
    <tbody>
        <tr>
        <td colspan="2" width="446" valign="top" height="18">
            <div style="MARGIN-LEFT: 6px; MARGIN-RIGHT: 6px"><b><font face="Verdana" color="#001F3E" size="1">CHECK OUT AND BILLING INFORMATION<br></font></b>
            </div>
        </td>
        </tr>
        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Reservation Number:</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["reservation_id"];?></font></td>
        </tr>
        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Guest Name:</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["guest_name"];?></font>
        </td>
        </tr>
        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Check In Date:</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["check_in_date"];?></font>
        </td>
        </tr>
        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Check Out Date:</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["check_out_date"];?></font>
        </td>
        </tr>
        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Nights Stay(s):</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["no_nights_stay"];?></font></td>
        </tr>
        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Adults:</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["adults"];?></font></td>
        </tr>
        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Children:</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["children"];?></font></td>
        </tr>
    <tr><td><br/></td><td></td></tr>
    <tr><td></td><td></td></tr>
        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Actual Check In:</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["check_in_actual"];?></font>
        </td>
        </tr>
        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Actual Check Out:</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["check_out_actual"];?></font>
        </td>
        </tr>
        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Actual Adults:</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["adults_actual"];?></font></td>
        </tr>
        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Actual Children:</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["children_actual"];?></font></td>
        </tr>

        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Room Type:</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["room_type"];?></font>
        </td>
        </tr>
        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Total Amount:</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["total_amount"];?></font>
        </td>
        </tr>
        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Advance Paid Amount:</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["advance_paid_amount"];?></font>
        </td>
        </tr>
        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Additional Amount:</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["additional_amount"];?></font>
        </td>
        </tr>
        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Balance Paid Amount:</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["balance_paid_amount"];?></font>
        </td>
        </tr>
        <tr>
        <td width="180" valign="top" height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 0px"><font face="Verdana" color="#001F3E" size="1">Room Rate:</font></div>
        </td>
        <td width="291" valign="top" height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["room_rate"];?> per room 
            per night - includes gratuities for housekeeping, bell services and valet; and in-room 
            coffee.</font>
        </td>
        </tr>
    </tbody>
</table><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>