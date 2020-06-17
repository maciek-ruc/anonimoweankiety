<?php
include('polaczenie.php');

if(isset($_POST['dalej1']) && isset($_POST['ile'])){
	
	$tytul = $_POST['tytul'];
	$klucz = $_POST['klucz'];
	$uid = $_SESSION['u_id'];
	
	$zaznacz="SELECT * FROM MR_ankiety where klucz='$klucz'";
	$wykonaj=mysqli_query($connect, $zaznacz);
	$zlicz=mysqli_num_rows($wykonaj);
	if($zlicz>0){
		echo "Klucz już jest zajęty<br>";
	} else{
		
		if(isset($_SESSION['czyAdmin']))
			$dodaj="INSERT INTO MR_ankiety(klucz, tytul, ID_autora) VALUES('$klucz','$tytul','0')";
		else
			$dodaj="INSERT INTO MR_ankiety(klucz, tytul, ID_autora) VALUES('$klucz','$tytul','$uid')";
		$y=mysqli_query($connect, $dodaj);

		$zaznacz="SELECT * FROM MR_ankiety order by ID_ankiety desc";
		$wykonaj=mysqli_query($connect, $zaznacz);
		$ankieta = mysqli_fetch_assoc($wykonaj);
		$id_ankiety = $ankieta['ID_ankiety'];
		
		
		for ($x = 1; $x <= (int)$_POST['ile']; $x++) {
			$pytanie = $_POST['pyt'.$x];
			$dodaj="INSERT INTO MR_pytania(ID_ankiety, pytanie) VALUES('$id_ankiety','$pytanie')";
			$y=mysqli_query($connect, $dodaj);
		}
		
		$message = "Dodano ankietę! Tytuł: ".$tytul.", Klucz dostępu: ".$klucz."";
		echo "<script type='text/javascript'>alert('$message');</script>";
		
		
	}
	
	

}


?>