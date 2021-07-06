<?php 
    /*PHP Dotenv is meant for the development environment and
    requires the .env file. However, since this file is ignored
    in for production and environment variables are set in the
    production environment, the file with dev env. variables is 
    loaded conditionally as illustrated below while the production 
    code runs on the prod. env. variables when file is ignored. */
    //Loading php dotenv file for development environment:
    if (file_exists(".env")) {
        require("vendor/autoload.php");
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    }
    
    //Connecting to database:
    $connection = mysqli_connect(
        $_ENV["DB_HOST"], 
        $_ENV["DB_USERNAME"], 
        $_ENV["DB_PASSWORD"], 
        $_ENV["DB_NAME"]
    ); // pay attention to the order of the items!

    if(!$connection) {
        echo "connection error: ".mysqli_connect_error()."<br/>";
    }
?>