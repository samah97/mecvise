<?php
    require_once 'config/config.php';
    require_once 'libraries/Core.php' ;
    require_once 'libraries/Controller.php' ;
    require_once 'libraries/Database.php' ;
    require_once 'helpers/url_helper.php' ;

      // Autoload Core Classes
    spl_autoload_register(function ($className) {
    require_once 'libraries/'. $className . '.php';
    //require_once 'helpers/'. $className . '.php';
    });
