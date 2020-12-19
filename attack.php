<?php

session_start();

// echo $_SESSION["time_1"];
// echo date("h:i:s", time());

$a = date("h:i:s", time());
$b = $_SESSION["time_1"];

$workingHours = (strtotime($a) - strtotime($b)) / 60;

$number = number_format($workingHours, 2);
// echo gettype($number);

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



// // echo '<pre>'; print_r($storeArray); echo '</pre>';
// echo $storeArrayuser1[1]["destroyer"];
// echo $storeArrayuser1[0]["destroyer"];



// echo '<pre>'; print_r($storeArrayuser2); echo '</pre>';
// echo gettype($storeArrayuser2[1]["destroyer"]);
// echo $storeArrayuser2[0]["destroyer"];

// $query = "SELECT * FROM user1";
// $result = $conn->query($query);

// $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
// echo json_encode($json );

//  echo $reveal;
$reveal = $_GET["obj"];

// echo $_SESSION['name'];

// $gameover = 0;
// echo $_SESSION['destroyer_1'];
//  $user1 = $_SESSION["nameid1"];
//  $user2 = $_SESSION["nameid2"];

//  echo $user1;
//  echo $user2;

if ($_SESSION['id'] == "user1") {

$result = $conn->query("SELECT * FROM user2");
if ($result == TRUE) {
$storeArrayuser2 = Array();
while ($row = mysqli_fetch_assoc($result)) {
    $storeArrayuser2[] =  $row; 
}
$gameresult = "MISS";

// $destroyer = 0;
// $submarine = 0;
// $crusier = 0;
// $battleship = 0;
// $carrier = 0;



for ($x = 0; $x <= 4; $x++) {
    if ($reveal === $storeArrayuser2[$x]["destroyer"]){
        $_SESSION["destroyer"] =$_SESSION["destroyer"] + 1;
        if($_SESSION["destroyer"] == 2) {
       echo "<h4>patrol boat destroyed </h4>";
       $_SESSION["gameover"] = $_SESSION["gameover"] +1 ;
        }
        $gameresult = "HIT";
    }
    if ($reveal === $storeArrayuser2[$x]["submarine"]){
        $_SESSION["submarine"] = $_SESSION["submarine"] + 1 ;
        if($_SESSION["submarine"] == 3) {
            echo  "<h4>submarine ship destroyed </h4>";
            $_SESSION["gameover"] = $_SESSION["gameover"] +1 ;
        }
         $gameresult = "HIT";
        
    }
    if ($reveal === $storeArrayuser2[$x]["crusier"]){
        $_SESSION["crusier"] = $_SESSION["crusier"] + 1;
        if($_SESSION["crusier"] == 3) {
            echo "<h4>crusier ship destroyed </h4>";
            $_SESSION["gameover"] = $_SESSION["gameover"] +1 ;
        }
         $gameresult = "HIT";
        
    }
    if ($reveal === $storeArrayuser2[$x]["battleship"]){
        $_SESSION["battleship"] = $_SESSION["battleship"] +1;
        if($_SESSION["battleship"] == 4) {
            echo  " <h4>battleship ship destroyed </h4>";
            $_SESSION["gameover"] = $_SESSION["gameover"] +1 ;
        }
         $gameresult = "HIT";
       
    }
    if ($reveal === $storeArrayuser2[$x]["carrier"]){
        $_SESSION["carrier"] = $_SESSION["carrier"] +1;
        if($_SESSION["carrier"] == 5) {
            echo "<h4>carrier ship destroyed </h4>";
            $_SESSION["gameover"] = $_SESSION["gameover"] +1 ;
        }
         $gameresult = "HIT";
    }
   
  }
echo  " <h3>You Completed {$gameresult} that on user2 </h3>";

if ($_SESSION["gameover"] === 5) {
    $sql = "DROP TABLE user1";
    if ($conn->query($sql) === TRUE) {
        // echo "Deleted Successfully the table user1";
        echo "<h5>YOU WIN </h5>";
        echo "<h5> {$_SESSION['name']} </h5>";
        $sql1 = "INSERT INTO user_main(id,name_user,time_user,games_won) VALUES (999,'".$_SESSION['name']."','".$number."', 0)";

        if ($conn->query($sql1) === TRUE) {
            echo "<h5>Added to leaderboard your name. </h5>";
        }
        else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "DROP TABLE user2";
    if ($conn->query($sql) === TRUE) {
        // echo "Deleted Successfully the table user2";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    session_destroy();
    }
}
else {
    echo "<h5> YOU LOSE {$_SESSION["name"]}</h5>"; 
}

}

// $destroyer_1 = 0;
// $submarine_1 = 0;
// $crusier_1 = 0;
// $battleship_1 = 0;
// $carrier_1 = 0;

if ($_SESSION['id'] == "user2") {
    $result = $conn->query("SELECT * FROM user1");

    if($result == TRUE) {
    $storeArrayuser1 = Array();
    while ($row = mysqli_fetch_assoc($result)) {
        $storeArrayuser1[] =  $row; 
    }
    $gameresult = "MISS";

for ($x = 0; $x <= 4; $x++) {

    if ($reveal === $storeArrayuser1[$x]["destroyer"]){
        ++$_SESSION["destroyer_1"];
        if($_SESSION["destroyer_1"] == 2) {
       echo "<h4>patrol boat destroyed </h4>";
       $_SESSION["gameover_1"] = $_SESSION["gameover_1"] +1 ;
        }
        $gameresult = "HIT";
        break;
    }
    if ($reveal === $storeArrayuser1[$x]["submarine"]){
       ++$_SESSION["submarine_1"];
        echo $_SESSION["submarine_1"];
        if($_SESSION["submarine_1"] == 3) {
            echo  "<h4>submarine ship destroyed </hr>";
            $_SESSION["gameover_1"] = $_SESSION["gameover_1"] +1 ;
        }
         $gameresult = "HIT";
         break;
        
    }
    if ($reveal === $storeArrayuser1[$x]["crusier"]){
        $_SESSION["crusier_1"] = $_SESSION["crusier_1"] + 1;
        if($_SESSION["crusier_1"] == 3) {
            echo "<h4> crusier ship destroyed </h4>";
            $_SESSION["gameover_1"] = $_SESSION["gameover_1"] +1 ;
        }
         $gameresult = "HIT";
         break;
        
    }
    if ($reveal === $storeArrayuser1[$x]["battleship"]){
        $_SESSION["battleship_1"] = $_SESSION["battleship_1"] +1;
        if($_SESSION["battleship_1"] == 4) {
            echo  " <h4> battleship ship destroyed </h4>";
            $_SESSION["gameover_1"] = $_SESSION["gameover_1"] +1 ;
        }
         $gameresult = "HIT";
         break;
       
    }
    if ($reveal === $storeArrayuser1[$x]["carrier"]){
        $_SESSION["carrier_1"] = $_SESSION["carrier_1"] +1;
        if($_SESSION["carrier_1"] == 5) {
            echo "<h4> carrier ship destroyed </h4>";
            $_SESSION["gameover_1"] = $_SESSION["gameover_1"] +1 ;
        }
         $gameresult = "HIT";
         break;
    }
    
} 
echo  " <h3>You Completed {$gameresult} that on user1 </h3>";
if ($_SESSION["gameover_1"] === 5) {
    $sql = "DROP TABLE user1";
    if ($conn->query($sql) === TRUE) {
        // echo "Deleted Successfully the table user1";
       echo "<h5>YOU WIN </h5>";
       echo "<h5> {$_SESSION["name"]} </h5>";
       
       $sql1 = "INSERT INTO user_main(id,name_user,time_user,games_won) VALUES (999,'".$_SESSION['name']."','".$number."', 0)";

       if ($conn->query($sql1) === TRUE) {
           echo "<h5>Added to leaderboard your name. </h5>";
       }
       else {
           echo "Error: " . $sql1 . "<br>" . $conn->error;
       }
   }

    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    $sql = "DROP TABLE user2";
    if ($conn->query($sql) === TRUE) {
        // echo "Deleted Successfully the table user2";
        // echo "you win";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        session_destroy();
    }
}
else {
    echo "<h5> YOU LOSE. {$_SESSION["name"]}</h5>"; 
}
    
}

?>