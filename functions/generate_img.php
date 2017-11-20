<?php

    function generate_img($data, $mime){
        
        header("Content-type: image/jpg"); 
        return $data; 

    }