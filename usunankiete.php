<?php
include('polaczenie.php');

if(isset($_POST['usunankiete']) && isset($_POST['id_ankiety'])){
	
	$id = $_POST['id_ankiety'];
	
	$zaznacz="delete FROM MR_ankiety where ID_ankiety='$id'";
	$wykonaj=mysqli_query($connect, $zaznacz);
	
	
}

?>