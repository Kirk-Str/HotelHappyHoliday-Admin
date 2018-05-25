<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>﻿<h2 class="wow fadeInDown">
    <?php echo $this->scope["message"];?>
</h2>
<p class="para-b wow fadeInDown">
    <?php echo $this->scope["subMessage"];?> <?php echo $this->scope["gotoPage"];?>
</p>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>