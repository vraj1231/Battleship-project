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

$result = $conn->query("SELECT * FROM user_main ORDER BY name_user ASC");

echo "<h4> Leaderboard order by name </h4>";

echo "<table border='1'>
<tr>
<th>id</th>
<th>user_email</th>
<th>time</th>
<th>games won</th>
</tr>";

while($row = mysqli_fetch_assoc($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name_user'] . "</td>";
echo "<td>" . $row['time_user'] . "</td>";
echo "<td>" . $row['games_won'] . "</td>";
echo "</tr>";
}
echo "</table>";



$result = $conn->query("SELECT * FROM user_main ORDER BY time_user DESC");

echo "<h4> Leaderboard order by  the time </h4>";

echo "<table border='1'>
<tr>
<th>id</th>
<th>user_email</th>
<th>time</th>
<th>games won</th>
</tr>";

while($row = mysqli_fetch_assoc($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name_user'] . "</td>";
echo "<td>" . $row['time_user'] . "</td>";
echo "<td>" . $row['games_won'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);

?>