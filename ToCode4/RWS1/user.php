<?php
	// Connect to database
	include("DB_Connection.php");
	$request_method = $_SERVER["REQUEST_METHOD"];

	function getinfoUsers()
	{
		global $conn;
		$query = "SELECT * FROM `infos`";
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	function getinfoUser($nom='')
	{   
		global $conn;
	
		if($nom != '')
		{
			$query="SELECT * FROM `infos` WHERE nom=$nom";
		}
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	
?>