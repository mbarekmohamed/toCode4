<?php
header("Content-Type:application/json");
if (isset($_GET['cin']) && $_GET['cin']!="") {
	include('DB_Connection.php');
	$cin = $_GET['cin'];
	$result = mysqli_query($conn,"SELECT * FROM `infos`");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
    $nom = $row["nom"];
    $prenom = $row["prenom"];
    $email = $row["email"];
    $tel = $row["tel"];
	
	response($name,$prenom, $email,$tel,$response_code,$response_desc);
	mysqli_close($conn);
	}else{
		response(NULL,NULL,NULL,NULL,200,"No Record Found");
		}
}else{
	response(NULL,NULL,NULL,NULL,400,"Invalid Request");
	}

function response($name,$prenom, $email,$tel,$response_code,$response_desc)
{
	$response['name'] = $name;
	$response['prenom'] = $prenom;
	$response['$email'] = $email;
	$response['tel'] = $tel;
    $response['response_code'] = $response_code;
	$response['response_desc'] = $response_desc;
	$json_response = json_encode($response);
	echo $json_response;
}
?>