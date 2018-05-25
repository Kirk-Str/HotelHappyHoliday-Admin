<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><script src="<?php echo Config::get('application_path') .'assets/lib/jquery/dist/jquery.js'; ?>"></script>
<script src="<?php echo Config::get('application_path') .'assets/lib/bootstrap/dist/js/bootstrap.js'; ?>"></script>
<script src="<?php echo Config::get('application_path') .'assets/lib/wow/dist/wow.min.js'; ?>"></script>
<script src="<?php echo Config::get('application_path') .'assets/lib/moment/moment.js'; ?>"></script>
<script src="<?php echo Config::get('application_path') .'assets/lib/bootstrap-daterangepicker/daterangepicker.js'; ?>"></script>
<script src="<?php echo Config::get('application_path') .'assets/js/site.js'; ?>" ></script>
<script src="<?php echo Config::get('application_path') .'assets/js/map.js'; ?>"></script>
<?php echo $this->scope["validationScripts"];
 /* end template body */
return $this->buffer . ob_get_clean();
?>