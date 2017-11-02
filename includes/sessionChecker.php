<?php 

    $user = new User();

    $isAdminUser = false;
    $userid = Session::exists('user') ? Session::get('user') : '';
    $username = Session::exists('username') ? Session::get('username') : '';

    if($user->find($userid)){
        $isAdminUser = $user->data()->role == 1 ? true : false;
    }
