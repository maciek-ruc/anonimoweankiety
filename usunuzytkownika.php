<?php
include('polaczenie.php');

if(isset($_POST['usunuzytkownika']) && isset($_POST['id_autora'])){
	
	$id = $_POST['id_autora'];
	
	$zaznacz="delete FROM MR_uzytkownicy where ID_autora='$id'";
	$wykonaj=mysqli_query($connect, $zaznacz);
	
	
}

?>