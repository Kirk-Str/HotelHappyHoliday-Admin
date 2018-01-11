<?php
    // Include the main class, the rest will be automatically loaded
    require __DIR__ . '../core/init.php';

    // Session::delete('user');
    
    // var_dump($_SESSION);


    // session_destroy();

    // unset($_SESSION['user_id']);

    //echo date('Y-m-d h:i:s a')

    // header("Content-type: image/png"); 
    // echo $_GET['img']; 

    //header("content-type:image/jpeg");
    
    // $host = 'localhost';
    // $user = 'root';
    // $pass = ' ';
    
    // mysql_connect($host, $user, $pass);
    
    // mysql_select_db('demo');
    
    // $name=$_GET['name'];
    
    // $select_image="select * from image_table where imagename='$name'";

    // $this->_db = DB::getInstance();
    
    // $data = $this ->_db->get('room',array($room_id, "=", '1'));

    // $data->thumbnail;
   
    $room = new Room();
    $room->getAvailableRooms('2017-11-18', '2017-11-21', 2);
    print_r($room);

?>