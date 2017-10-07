<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf53cafaede392927695eca28c32c4e8c
{
    public static $files = array (
        '25226d3a78c8767bf805b61b0c1243a7' => __DIR__ . '/../..' . '/core/init.php',
        'cb6e10566b8bad640922aba7ecd33ee9' => __DIR__ . '/../..' . '/functions/sanitize.php',
        '5d1441d806e4b906a7a4309631879c3b' => __DIR__ . '/../..' . '/functions/objectToArray.php',
    );

    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dwoo\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dwoo\\' => 
        array (
            0 => __DIR__ . '/..' . '/dwoo/dwoo/lib/Dwoo',
        ),
    );

    public static $classMap = array (
        'Booking' => __DIR__ . '/../..' . '/classes/Booking.php',
        'Config' => __DIR__ . '/../..' . '/classes/Config.php',
        'Cookie' => __DIR__ . '/../..' . '/classes/Cookie.php',
        'DB' => __DIR__ . '/../..' . '/classes/DB.php',
        'Hash' => __DIR__ . '/../..' . '/classes/Hash.php',
        'Input' => __DIR__ . '/../..' . '/classes/Input.php',
        'PageTemplate' => __DIR__ . '/../..' . '/classes/PageTemplate.php',
        'Redirect' => __DIR__ . '/../..' . '/classes/Redirect.php',
        'Request' => __DIR__ . '/../..' . '/classes/Request.php',
        'Reservation' => __DIR__ . '/../..' . '/classes/Reservation.php',
        'Room' => __DIR__ . '/../..' . '/classes/Room.php',
        'Session' => __DIR__ . '/../..' . '/classes/Session.php',
        'Template' => __DIR__ . '/../..' . '/classes/Template.php',
        'Token' => __DIR__ . '/../..' . '/classes/Token.php',
        'User' => __DIR__ . '/../..' . '/classes/User.php',
        'Validate' => __DIR__ . '/../..' . '/classes/Validate.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf53cafaede392927695eca28c32c4e8c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf53cafaede392927695eca28c32c4e8c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf53cafaede392927695eca28c32c4e8c::$classMap;

        }, null, ClassLoader::class);
    }
}
