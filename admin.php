<?php
include('header.php');
include('usunankiete.php');
include('usunuzytkownika.php');

if(!isset($_SESSION['czyAdmin']))
	header("location: index.php");


?>



<div class="container text-center">
	
  <div class="jumbotron">
  <h1>Panel administratora</h1>
    <p> <?php 
echo "".$_SESSION['u_login']." sprawdź swoje ankiety.<br>";



?></p> 



  </div>   
</div>


<div class="container text-center" >  

  
  <div class="col-sm-4">
<p>Wszystkie ankiety:</p>


<?php
	$uid = $_SESSION['u_id'];
	$zaznacz="select ID_ankiety, tytul, MR_ankiety.ID_autora, nazwa from MR_ankiety left join MR_uzytkownicy on MR_ankiety.ID_autora = MR_uzytkownicy.ID_autora;";
	$wykonaj=mysqli_query($connect, $zaznacz);
	$zlicz=mysqli_num_rows($wykonaj);
	if($zlicz<1){
		echo "Nie znaleziono żadnej ankiety<br>";
	}
	else{
		while($ankieta = mysqli_fetch_assoc($wykonaj)){
			$id_ankiety = $ankieta['ID_ankiety'];
			$autor = $ankieta['nazwa'];
			$autor = ($ankieta['ID_autora'] == '0'? 'ADMINISTRATOR' : $autor);
			$autor = ($autor == null? 'USUNIĘTY' : $autor);
			
			echo "Nazwa: ".$ankieta['tytul']."<br>
			Autor: ".$autor."
			<form method='POST' action='ankieta.php'>
			<input type='hidden' name='id_ankiety' value='$id_ankiety'>
			<input type='submit' value='Wyniki'>
			</form>
			<form method='POST' action=''>
			<input type='hidden' name='id_ankiety' value='$id_ankiety'>
			<input type='submit' name='usunankiete' value='Usuń ankietę' onclick=\"return confirm('Czy na pewno chcesz usunąć?')\">
			</form>
			<br>";
		}
	}
	
?>   
</div>
<div class="col-sm-4">

 <p>Wszyscy użytkownicy:</p>


<?php
	$uid = $_SESSION['u_id'];
	$zaznacz="select * from MR_uzytkownicy;";
	$wykonaj=mysqli_query($connect, $zaznacz);
	$zlicz=mysqli_num_rows($wykonaj);
	if($zlicz<1){
		echo "Nie znaleziono żadnego użytkownika<br>";
	}
	else{
		while($ankieta = mysqli_fetch_assoc($wykonaj)){
			$id_autora = $ankieta['ID_autora'];
			$autor = $ankieta['nazwa'];
			
			echo "
			Autor: ".$autor."
			
			<form method='POST' action=''>
			<input type='hidden' name='id_autora' value='$id_autora'>
			<input type='submit' name='usunuzytkownika' value='Usuń użytkownika' onclick=\"return confirm('Czy na pewno chcesz usunąć?')\">
			</form>
			<br>";
		}
	}
	
?>   


    </div>
  <div class="col-sm-4">
  
  <a href="tworzenie.php">
  <button type="button"  class="btn btn-warning" href="tworzenie.php" >Stwórz ankietę</button>
  </a>
  
 <a href="wypelnianie.php">
  <button type="button"  class="btn btn-warning" href="wypelnianie.php" >Wypełnij ankietę</button>
  </a>


    </div>

    </div>




</body>
<footer class="container-fluid text-center" >
  <p>Strona poświęcona anonimowym ankietom.</p>
</footer>
</html>