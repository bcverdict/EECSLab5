<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
$name = $_POST['name'];
if($name==NULL)
{
  printf("Empty string\n");
}
$mysqli = new mysqli("mysql.eecs.ku.edu", "n166a067", "aePohk7i", "n166a067");

/* check connection */
if ($mysqli->connect_errno)
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
if($_POST["name"] != "")
{
	$query = "SELECT * FROM Users where user_id ='".$name."'";
	$result = $mysqli->query($query);
	$row = "";
	$userRow = "";
	while($row = $result->fetch_assoc())
	{
		if ($row["user_id"]!="")
		{
			$userRow = $row["user_id"];
		}
		echo "<P>".$row["user_id"]."</p>";
	}
	if($userRow)
	{
		echo"User exists";
	}
	else
	{
		$add = "INSERT INTO Users (user_id) VALUES ('".$name."')";
		$Qresult = $mysqli->query($add);
		echo "the querty result is " . $Qresult;
		if($result)
		{
			echo "<p>User successfully added</p>";
		}
	}
}
?>
