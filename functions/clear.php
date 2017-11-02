<?php

    function clearMessage(){

        Session::delete('message_title');
        Session::delete('message');
        Session::delete('sub_message');
        Session::delete('goto_page');

    }