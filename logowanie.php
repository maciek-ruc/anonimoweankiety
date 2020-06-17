<?php
include('polaczenie.php');

if(isset($_POST['loguj'])){
	$login=$_POST['login'];
	$haslo=$_POST['haslo'];
	
	
	$zaznacz="SELECT * FROM MR_admin WHERE nazwa='$login'";
	$wykonaj=mysqli_query($connect, $zaznacz);
	$zlicz=mysqli_num_rows($wykonaj);
	if($zlicz==1){
		if($konto = mysqli_fetch_assoc($wykonaj)){
			$hash = sha1($haslo);
			if($konto['nazwa']==$login && $konto['haslo']==$hash){
				
				$_SESSION['u_id']=$konto['ID_autora'];
				$_SESSION['u_login']=$konto['nazwa'];
				$_SESSION['czyAdmin'] = true;
				
				echo "zalogowano";
				header("location: admin.php");
				exit();
			}
			else{
				echo "Hasło błędne<br>";
				
			}
		}
	} else{
	
		$zaznacz="SELECT * FROM MR_uzytkownicy WHERE nazwa='$login'";
		$wykonaj=mysqli_query($connect, $zaznacz);
		$zlicz=mysqli_num_rows($wykonaj);
		if($zlicz<1){
			echo "Nie znaleziono odpowiedniego konta<br>";
		}
		else{
			if($konto = mysqli_fetch_assoc($wykonaj)){
				$hash = sha1($haslo);
				if($konto['nazwa']==$login && $konto['haslo']==$hash){
					
					$_SESSION['u_id']=$konto['ID_autora'];
					$_SESSION['u_login']=$konto['nazwa'];
					
					echo "zalogowano";
					header("location: index.php");
					exit();
				}
				else{
					echo "Hasło błędne<br>";
					
				}
			}
		}
	}
}
?>