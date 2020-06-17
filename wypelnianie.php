<?php
include('header.php');

?>
<div class="container text-center">
<div class="container">
  <div class="jumbotron">
    <h1>Anonimowa ankieta</h1>      
    <p>Twórz i wypełniaj ankiety bezpiecznie</p>
  </div>   
</div>

<div class="container">



<?php


if(!isset($_POST['dalej']))
	$_POST['dalej'] = 0;

if($_POST['dalej'] == 0){
	echo'
	<form method="POST" action="">
		<label>Podaj nazwę ankiety:</label><br>
		<input type="text" name="nazwa" required placeholder="nazwa ankiety"><br>
		<label>Podaj klucz dostępu do ankiety:</label><br>
		<input type="password" name="klucz" placeholder="klucz" required>
		<input type="hidden" name="dalej" value="1"><br><br>
		<input type="submit" name="szukaj" value="Znajdź ankietę">
	</form>
	';
}

if($_POST['dalej'] == 1){
	$nazwa = $_POST['nazwa'];
	$klucz = $_POST['klucz'];
	$zaznacz="SELECT * FROM MR_ankiety where klucz='$klucz'and tytul='$nazwa'";
	$wykonaj=mysqli_query($connect, $zaznacz);
	$zlicz=mysqli_num_rows($wykonaj);
	if($zlicz==1){
		$ankieta = mysqli_fetch_assoc($wykonaj);
		$id_ankiety = $ankieta['ID_ankiety'];
		$tytul = $ankieta['tytul'];
		
		$hash = sha1($_SESSION['u_id']);
		$zaznacz="SELECT * FROM MR_uz_ank where ID_ankiety='$id_ankiety' and ID_uzytkownika='$hash'";
		$wykonaj=mysqli_query($connect, $zaznacz);
		$zlicz=mysqli_num_rows($wykonaj);
		if($zlicz==0){
			
		
			echo 'Nazwa ankiety: '.$tytul.'<br><br>';
			
			$zaznacz="SELECT * FROM MR_pytania where ID_ankiety='$id_ankiety'";
			$wykonaj=mysqli_query($connect, $zaznacz);
			$zlicz=mysqli_num_rows($wykonaj);
			
			echo '<form method="POST" action="">';
			
			while ($pytanie = mysqli_fetch_assoc($wykonaj)){
				echo "<div class='pytanie'>";
					echo $pytanie['pytanie']."<br>";
					$ID_pytania = $pytanie['ID_pytania'];
					echo "<input type='text' name='$ID_pytania' required><br>";	
				echo "</div><br>";
			}
			
			echo '
			<input type="hidden" name="dalej" value="2">
			<input type="submit" name="dodaj" value="Dodaj odpowiedzi">
			</form>';
		} else{
			
			echo 'Nie możesz ponownie wypełnić tej ankiety.<br><br>';
		
			echo'
			<form method="POST" action="">
				<label>Podaj nazwę ankiety:</label><br>
				<input type="text" name="nazwa" required placeholder="nazwa ankiety"><br>
				<label>Podaj klucz dostępu do ankiety:</label><br>
				<input type="password" name="klucz" required>
				<input type="hidden" name="dalej" value="1"><br><br>
				<input type="submit" name="szukaj" value="Znajdź ankietę">
			</form>
			';
			
		}
	} else{
		
		echo 'Nie znaleziono odpowiedniej ankiety! Spróbuj ponownie.<br><br>';
		
		echo'
		<form method="POST" action="">
			<label>Podaj nazwę ankiety:</label><br>
			<input type="text" name="nazwa" required placeholder="nazwa ankiety"><br>
			<label>Podaj klucz dostępu do ankiety:</label><br>
			<input type="password" name="klucz" required>
			<input type="hidden" name="dalej" value="1"><br><br>
			<input type="submit" name="szukaj" value="Znajdź ankietę">
		</form>
		';
		
	}
	
}

if($_POST['dalej'] == 2){
	
	
    foreach ($_POST as $id_pytania => $odpowiedz) {
		if(!is_numeric($id_pytania))
			continue;

		$dodaj="INSERT INTO MR_odpowiedz(ID_pytania, odpowiedz) VALUES('$id_pytania','$odpowiedz')";
		$y=mysqli_query($connect, $dodaj);
		$id_pytania_kopia = $id_pytania;
	}

	$zaznacz="SELECT * FROM MR_pytania where ID_pytania='$id_pytania_kopia' limit 1";
	$wykonaj=mysqli_query($connect, $zaznacz);
	$ankieta = mysqli_fetch_assoc($wykonaj);
	$id_ankiety = $ankieta['ID_ankiety'];
	
	$hash = sha1($_SESSION['u_id']);
	
	//echo $id_ankiety." - ".$hash."<br>";
	
	$dodaj="INSERT INTO MR_uz_ank(ID_ankiety, ID_uzytkownika) VALUES('$id_ankiety','$hash')";
	$y=mysqli_query($connect, $dodaj);
	//echo "y: ".$y."<br>";
	
	echo 'Pomyślnie dodano odpowiedź!<br>';
	
	//header("location: zalogowany.php");

	
	
}

?>
</div>
</div>
</body>
<footer class="container-fluid text-center" >
  <p>Strona poświęcona anonimowym ankietom.</p>
</footer>
</html>