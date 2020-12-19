<?php
$servername = "localhost";
$username = "AdminLab12";
$password = "4VPnroTOC6wOU3mn";
$dbname = "project_main";

global $servername, $username, $password,$dbname;
    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
if ($conn->connect_error) 
{
die("Connection failed: " . $conn->connect_error ."<br>");
} 
echo "Connected successfully to database <br>";

if(isset($_GET['signupbtn'])) {

   
    $name = $_GET['firstname'];
    $email = $_GET['mail'];
    $pass = $_GET['pass'];

 
    $select_username_query = "SELECT * FROM user_info WHERE name='$name'";
    $select_username_result = $conn->query($select_username_query );

    $select_email_query = "SELECT * FROM users_info WHERE email_id='$email'";
    $select_email_result = $conn->query( $select_email_query );

    if( mysqli_num_rows($select_username_result) > 0 ) {
      echo "<script>alert('User Already taken');</script>";
    }
    else if( mysqli_num_rows($select_email_result) === 1 ) {
      echo "<script>alert('Email Id already taken');</script>";
      
    }
    else {
    $sql = "INSERT INTO user_info(name, password, email_id) VALUES('$name', '$pass', '$email')";
    if($conn->query($sql)){
        echo "you have signup successfully";
    }
}
header( "refresh:1;url=main.html");

$conn->close();
}

?>