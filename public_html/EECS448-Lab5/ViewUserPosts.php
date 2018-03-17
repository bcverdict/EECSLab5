<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "n166a067", "aePohk7i", "n166a067");
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	$name = $_POST["name"];
	if ($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$query = "SELECT content FROM Posts WHERE author_id='" . $name . "'";
	$result = $mysqli->query($query);
	if ($result)
	{
    echo "<table style=\"border: 1px solid black\">";
    echo "<tr>";
    echo "<th style=\"border: 1px solid black; text-align: center\">";
    echo $name . "'s Posts";
    echo "</th>";
    echo "</tr>";
		while($row = $result->fetch_assoc())
		{
      echo "<tr>";
      echo "<td style=\"border: 1px solid black; text-align: center\">";
      echo $row["content"];
      echo "</td>";
      echo "</tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "The user has no posts.<br>";
	}
	$mysqli->close();
?>
