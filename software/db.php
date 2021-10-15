
 
 
 <?php

$db_name = 'khadra';
$user    = 'khadra';
$pass    = 'khadra12345678';


 $con = mysqli_connect('sg2nlmysql19plsk.secureserver.net:3306', $user, $pass, $db_name);
    if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }

$db = mysqli_connect('sg2nlmysql19plsk.secureserver.net:3306', $user, $pass,'khadra');

    if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }


	$dsn 	 = 'mysql:host=sg2nlmysql19plsk.secureserver.net:3306;dbname='.$db_name;
	$option  = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);


	try {

		$conn = new PDO($dsn, $user, $pass, $option);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	}
	catch (PDOException $e) {
		echo "The Connection To The Database Failed " . $e->getMessage();
	}

 
 ?>