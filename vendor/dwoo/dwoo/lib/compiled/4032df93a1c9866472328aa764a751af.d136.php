<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><script src="<?php echo Config::get('application_path') .'assets/lib/jquery-validation/dist/jquery.validate.js'; ?>"></script>
<script src="<?php echo Config::get('application_path') .'assets/lib/jquery-validation-unobtrusive/jquery.validate.unobtrusive.js'; ?>"></script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>