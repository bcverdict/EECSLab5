<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "n166a067", "aePohk7i", "n166a067");
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	if ($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$query = "SELECT * FROM Users";
	$result = $mysqli->query($query);
	if($result)
	{
    echo "<table style=\"border: 1px solid black\">";
    echo "<tr>";
    echo "<th style=\"border: 1px solid black; text-align: center\">";
    echo "Users";
    echo "</th>";
    echo "</tr>";
		while($row = $result->fetch_assoc())
		{
      echo "<tr>";
      echo "<td style=\"border: 1px solid black; text-align: center\">";
      echo $row["user_id"];
      echo "</td>";
      echo "</tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "No users in database.<br>";
	}
	$mysqli->close();
?>
