<?php

  function data_uri($data, $mime) 
  {  
      $contents = file_get_contents($data);
      $base64   = base64_encode($contents); 
      return ('data:' . $mime . ';base64,' . $base64);
  }