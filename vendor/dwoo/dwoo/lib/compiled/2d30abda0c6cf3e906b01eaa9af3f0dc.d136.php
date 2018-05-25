<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>

<table cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff">
   <tbody>
      <tr>
         <td colspan="2" height="18">
            <div style="MARGIN-LEFT: 6px; MARGIN-RIGHT: 6px"><b><font face="Verdana" color="#001F3E" size="1">OFFER REQUEST INFORMATION<br></font></b>
            </div>
         </td>
      </tr>
      <tr>
         <td width="180"  height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Request No.:</font></div>
         </td>
         <td   height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["request_id"];?></font></td>
      </tr>
      <tr>
         <td width="180"  height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Guest Name:</font></div>
         </td>
         <td   height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["guest_name"];?></font>
         </td>
      </tr>
      <tr>
         <td width="180"  height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Offer/Package Name:</font></div>
         </td>
         <td   height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["offer_name"];?></font>
         </td>
      </tr>
      <tr>
         <td width="180"  height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Rate per Guest:</font></div>
         </td>
         <td   height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo number_format((isset($this->scope["rate_per_guest"]) ? $this->scope["rate_per_guest"] : null), 2);?></font>
         </td>
      </tr>
      <tr>
         <td width="180"  height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Event Start Date:</font></div>
         </td>
         <td   height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["start_date"];?></font>
         </td>
      </tr>
      <tr>
         <td width="180"  height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Event End Date:</font></div>
         </td>
         <td   height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["end_date"];?></font>
         </td>
      </tr>
      <tr>
         <td width="180"  height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">No. of Guests:</font></div>
         </td>
         <td   height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["guests"];?></font></td>
      </tr>
      <tr>
         <td width="180"  height="10">
            <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 6px"><font face="Verdana" color="#001F3E" size="1">Notes:</font></div>
         </td>
         <td   height="10"><font face="Verdana" color="#001F3E" size="1"><?php echo $this->scope["additional_request"];?></font></td>
      </tr>
   </tbody>
</table>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>