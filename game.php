<?php

session_start();


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

$data = $_GET["obj"];
$array = json_decode($data);

$destoryer0 = $array[0]->directions[0];
$destoryer1 = $array[0]->directions[1];
$submarine0 = $array[1]->directions[0];
$submarine1 = $array[1]->directions[1];
$submarine2 = $array[1]->directions[2];
$crusier0 = $array[2]->directions[0];
$crusier1 = $array[2]->directions[1];
$crusier2 = $array[2]->directions[2];
$battleship0 = $array[3]->directions[0];
$battleship1 = $array[3]->directions[1];
$battleship2 = $array[3]->directions[2];
$battleship3 = $array[3]->directions[3];
$carrier0 = $array[4]->directions[0];
$carrier1 = $array[4]->directions[1];
$carrier2 = $array[4]->directions[2];
$carrier3 = $array[4]->directions[3];
$carrier4 = $array[4]->directions[4];


$count = 0;
$query = "SELECT * FROM user1";

// execute query 
$result = $conn->query($query);
// see if any rows were returned 
if (mysqli_num_rows($result) > 0) { 
$table_name = "user2";
$query1 = "SELECT * FROM user2";
$result1 = $conn->query($query1);

if (mysqli_num_rows($result1) > 0) {
 return;
}
else {
$sql = "INSERT INTO $table_name (destroyer,submarine,crusier,battleship,carrier) VALUES($destoryer0, $submarine0, $crusier0, $battleship0, $carrier0)";
if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
$sql = "INSERT INTO $table_name(destroyer,submarine,crusier,battleship,carrier) VALUES($destoryer1, $submarine1, $crusier1, $battleship1, $carrier1)";
if ($conn->query($sql) === TRUE) {
      // echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
$sql = "INSERT INTO $table_name(destroyer,submarine,crusier,battleship,carrier) VALUES(999, $submarine2, $crusier2, $battleship2, $carrier2)";
if ($conn->query($sql) === TRUE) {;
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
$sql = "INSERT INTO $table_name(destroyer,submarine,crusier,battleship,carrier) VALUES(999,999,999,$battleship3, $carrier3)";
if ($conn->query($sql) === TRUE) {
          // echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
     }
 $sql = "INSERT INTO $table_name(destroyer,submarine,crusier,battleship,carrier) VALUES(999, 999, 999, 999,$carrier4)";
if ($conn->query($sql) === TRUE) {
        //  echo "New record created successfully";
       } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
       }

      }
    }
 
else {

  $table_name = "user1";
$sql = "INSERT INTO $table_name(destroyer,submarine,crusier,battleship,carrier) VALUES($destoryer0, $submarine0, $crusier0, $battleship0, $carrier0)";
if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
$sql = "INSERT INTO $table_name(destroyer,submarine,crusier,battleship,carrier) VALUES($destoryer1, $submarine1, $crusier1, $battleship1, $carrier1)";
if ($conn->query($sql) === TRUE) {
      // echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
$sql = "INSERT INTO $table_name(destroyer,submarine,crusier,battleship,carrier) VALUES(999,$submarine2, $crusier2, $battleship2, $carrier2)";
if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
$sql = "INSERT INTO $table_name(destroyer,submarine,crusier,battleship,carrier) VALUES(999, 999, 999,$battleship3, $carrier3)";
if ($conn->query($sql) === TRUE) {
          // echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
     }
 $sql = "INSERT INTO $table_name(destroyer,submarine,crusier,battleship,carrier) VALUES( 999, 999, 999, 999, $carrier4)";
if ($conn->query($sql) === TRUE) {
        //  echo "New record created successfully";
       } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
       }

      }

?>
