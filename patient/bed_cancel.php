<?php  
	

	if(isset($_GET['del']) && !empty($_GET['del'])){

		require_once 'auth.php';
  		require_once 'dbcon.php';

  		$id = $_GET['del'];

  		$sql = "DELETE FROM bed_booking WHERE id = '$id'";
  		// echo $sql;exit();

  		mysqli_query($con,$sql);
  		echo "<script language='javascript'>";
        echo "alert('Successfully Cancel Your Bed booking !');";
        echo "window.location='bed.php';";
        echo "</script>";

	}

?>