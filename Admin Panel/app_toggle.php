<?php

	require_once("ddbconnection.php");
	$catId = $_POST['sId'];
	$sql = "SELECT * FROM `appointment` WHERE `id` = '$catId'";
	// echo $sql;
	$result = mysqli_query($con, $sql);
	$data = mysqli_fetch_assoc($result);
	$status = $data['status'];

	if($status == '1'){
		$status = '0';
	} else{
		$status = '1';
	}

	$update = "UPDATE appointment SET `status` = '$status' where `id` = '$catId'";
	$result_1 = mysqli_query($con, $update);
	if($result_1){
		echo $status;
	}

?>