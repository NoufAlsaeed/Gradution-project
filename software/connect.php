<?php 

    $dsn = "mysql:host=sg2nlmysql19plsk.secureserver.net:3306;dbname=khadra";

    $user = "khadra";

    $pass = "khadra12345678";

    $options = array(

        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        
    );

    try {

        $connect = new PDO($dsn, $user, $pass, $options);

    } catch (PDOException $error) {

        echo "Faild to connect because: " . $error->getMessage();

    }

?> 