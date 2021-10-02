<?php

session_start();


  // This variable must be true on Cloud 9 to define global variables according to cloud 9 server, else define variables as local server (My PC)!
  $production = false;

  if($production){
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    //define("DB_PASS", "6yOhRabhambD");
    define("DB_NAME", "Mecvise_DB");
  
      // URL Root (eg. http://myapp.com or http://localhost/myapp)
      define('URLROOT', 'http://phpmvc.domvp.xyz/');    
  }else{
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "mecvise_db");
  
      // URL Root (eg. http://myapp.com or http://localhost/myapp)
      define('URLROOT', 'http://localhost/Mecvise/');
  }

  // App Root
  define('APPROOT', dirname(dirname(__FILE__)));

  // Site Name
  define('SITENAME', 'Mecvise');

  //Mail Configs
