<?php
// Start the session
session_start();

// Check if a specific session variable is set
// if (!isset($_SESSION['authorized_access']) || $_SESSION['authorized_access'] !== true) {
//     // If access is not authorized, display an error and exit
//     http_response_code(403); // Send a 403 Forbidden HTTP status
//     echo "Access Denied";
//     exit();
// }


// The MySQL service named in the docker-compose.yml.
$host = 'datadb';

// Database use name
$username = getenv("MYSQL_USER");

//database user password
$pass = getenv("MYSQL_PASSWORD");

$DB = getenv("MYSQL_DATABASE");

$user = $_POST['user'];
$password = $_POST['password'];
// Create connection
$con = new mysqli("$host", "$username","$pass","$DB");
if($con->connect_error){
	die("failed to connect : " .$con->connect_error);
} else {
$stmt = $con->prepare("select * from logintable where user = ?");
	$stmt->bind_param("s",$user);
	$stmt->execute();
	$stmt_result = $stmt->get_result();
	if($stmt_result->num_rows > 0) {
	  $data = $stmt_result->fetch_assoc();
		if($data['password'] ==$password) {
		$_SESSION['authorized_access'] = true;
		include("welcompage.html");
		} else {
     			echo "<h3>Invalid password</h3>";

		}
	} else {
	 echo "<h3>kuch bhi name mt dalo</h3>";
	}
}
$stmt->close();
$con->close();
?>