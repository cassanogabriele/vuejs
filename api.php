<?php
$conn = new mysqli("localhost", "c0mlist", "drbtSVG_55", "c0memblist");
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$out = array('error' => false);

$crud = 'read';

if(isset($_GET['crud'])){
	$crud = $_GET['crud'];
}

if($crud == 'read'){
	$sql = "SELECT * FROM members";
	$query = $conn->query($sql);
	$members = array();

	while($row = $query->fetch_array()){
		array_push($members, $row);
	}

	$out['members'] = $members;
}

if($crud == 'create'){

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];

	$sql = "INSERT INTO members (firstname, lastname) VALUES ('$firstname', '$lastname')";
	$query = $conn->query($sql);

	if($query){
		$out['message'] = "Membre ajouté avec succès";
	}
	else{
		$out['error'] = true;
		$out['message'] = "Le membre ne peut être supprimé";
	}	
}

if($crud == 'update'){
 
	$memid = $_POST['memid'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
 
	$sql = "UPDATE members SET firstname='$firstname', lastname='$lastname' where memid='$memid'";
	$query = $conn->query($sql);
 
	if($query){
		$out['message'] = "Membre modifé avec succès";
	}
	else{
		$out['error'] = true;
		$out['message'] = "Le membre ne peut être supprimé";
	} 
}

if($crud == 'delete'){
 
	$memid = $_POST['memid'];
 
	$sql = "DELETE FROM members WHERE memid='$memid'";
	$query = $conn->query($sql);
 
	if($query){
		$out['message'] = "Membre supprimé avec succès";
	}
	else{
		$out['error'] = true;
		$out['message'] = "Le membre ne peut être supprimé";
	} 
}

$conn->close();

header("Content-type: application/json");
echo json_encode($out);
die();
?>