<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff">
    <tbody>
        <tr>
        <td   align="center" height="26">
                <div style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 10px" ><b><font face="Verdana" color="#001F3E" size="4">Hi, <?php echo $this->scope["guest_name"];?>!</font></b>
            </div>
            </td>
        </tr>
        <tr>
        <td   align="center" height="20">
                <p style="MARGIN-LEFT: 10px; MARGIN-RIGHT: 10px"  ><font face="Helvetica" color="#001F3E" size="3">You have made the right decision! Thank-you for choosing us!, We at Orca Beach Resort can't wait to serve you the best of what we've got.
                </font>
            </p>
            </td>
        </tr>
        <tr>
        <tr>
            <td align="center" height="300">
                <img src="http://orcabeach.ezyro.com/assets/images/logosicons/cake.png" height="150px" width="150px" border="0" alt="Orca Beach Resort Logo"/> 
            </td>
        </tr>
    </tbody>
</table><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>