<?php

include('db.php');
$id = $_GET['id'];
$delete = "DELETE FROM card_activation WHERE id = $id";
$run_data = mysqli_query($con,$delete);

if($run_data){
	header('location:active.php');
}else{
	echo "Donot Delete";
}


?>