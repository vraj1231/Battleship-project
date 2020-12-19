<?php
session_start();

$_SESSION['id'] ="user1"; 
$_SESSION["nameid1"] = "";
$_SESSION["nameid2"] = "";

$_SESSION["destroyer_1"] = 0;
$_SESSION["submarine_1"] = 0;
$_SESSION["crusier_1"] = 0;
$_SESSION["battleship_1"] = 0;
$_SESSION["carrier_1"] = 0;
$_SESSION["destroyer"] = 0;
$_SESSION["submarine"] = 0;
$_SESSION["crusier"] = 0;
$_SESSION["carrier"] = 0;
$_SESSION["battleship"] = 0;
$_SESSION["gameover"] = 0;
$_SESSION["gameover_1"] = 0;


$_SESSION["time_1"] = date('h:i:s');
echo $_SESSION["time_1"];

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
// echo "Connected successfully to database <br>";

if(isset($_GET['login'])) {


    $email = $_GET['mail'];
    $pass = $_GET['pass'];

    $check_user_query = "SELECT * FROM user_info WHERE email_id ='$email'";
        $check_user_result = $conn->query($check_user_query);

        if( mysqli_num_rows($check_user_result) == 0 ) {
          echo "<script>alert('Invalid User Please sign up');</script>";
        }
        else {
            $row = mysqli_fetch_assoc( $check_user_result );

            if ( $pass === $row['password']) {

                $_SESSION['name'] = $row['name'];
                $_SESSION['email_id'] = $row['email_id'];

                sleep(1);
            }
            else {
              echo "<script>alert('Invalid password');</script>";
            
            }

        }
        createTable("user1"); //$_SESSION["name"])
        header('Location: front.html');
    }

   
    
    function createTable($username1)
    {
        global $servername, $username, $password,$dbname;
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error ."<br>");
        } 
       
        // echo "Connected successfully <br>";
        
        $sql = "CREATE TABLE $username1 (
        destroyer INT(2) NOT NULL,
        submarine INT(2) NOT NULL,
        crusier INT(2) NOT NULL,
        battleship INT(2) NOT NULL,
     
        carrier INT(2) NOT NULL

        )";
        $_SESSION["nameid1"] = $_SESSION['name'];
        
        if ($conn->query($sql) === TRUE) {
            // echo "Table ". $username1. "created successfully";
            $_SESSION['id'] = "user1";
            
        
           
          } else {
            $_SESSION["nameid2"] = $_SESSION['name'];
            
            // echo "Error creating table: " . $conn->error. " making new user2 table.";
            $sql1 = "CREATE TABLE user2 (
                destroyer INT(2) NOT NULL,
                submarine INT(2) NOT NULL,
                crusier INT(2) NOT NULL,
                battleship INT(2) NOT NULL,
                carrier INT(2) NOT NULL
        
                )";
     
                if ($conn->query($sql1) === TRUE) {
                    // echo "Table user2 created successfully";
                    $_SESSION['id'] = "user2";
                  
                  
                  } else {
                    // echo "Error creating table: " . $conn->error.
                  }


          }
          
          $conn->close();
    }
    
?>