<?php
include('header.php');

?>
<div class="container text-center">
  <div class="jumbotron">
    <h1>Twoje ankiety</h1> 
<p> <?php 
echo "Witaj ".$_SESSION['u_login'].". Jesteś zalogowany.<br>";
?></p> 

</div>
</div>
<div class="container text-center">
<?php

echo "Witaj ".$_SESSION['u_login'].". Jesteś zalogowany.<br>";


	$id_ankiety = $_POST['id_ankiety'];
	
	$zaznacz="SELECT * FROM MR_ankiety WHERE ID_ankiety='$id_ankiety'";
	$wykonaj=mysqli_query($connect, $zaznacz);
	$ankieta = mysqli_fetch_assoc($wykonaj);
	echo "Nazwa ankiety: ".$ankieta['tytul']."<br>";
	echo "Kod dostępu: ".$ankieta['klucz']."<br>";
		
	$zaznacz="SELECT * FROM MR_uz_ank WHERE ID_ankiety='$id_ankiety'";
	$wykonaj=mysqli_query($connect, $zaznacz);
	$ile = 0;
	while($ankieta = mysqli_fetch_assoc($wykonaj)){
			$ile++;
		}
	echo 'Ankieta została wypełniona '.$ile.' ';
	if($ile!=1)
		echo 'razy.';
	else
		echo 'raz.';
	echo '<br><br>';


	$zaznacz="select * from MR_pytania where ID_ankiety=$id_ankiety";
	$wykonaj=mysqli_query($connect, $zaznacz);
	while($ankieta = mysqli_fetch_assoc($wykonaj)){
			
			echo "Pytanie: ".$ankieta['pytanie']."<br>";
			
			$ID_pytania = $ankieta['ID_pytania'];
			$zaznacz2="select odpowiedz from MR_odpowiedz where ID_pytania=$ID_pytania";
			$wykonaj2=mysqli_query($connect, $zaznacz2);

			while($ankieta2 = mysqli_fetch_assoc($wykonaj2)){

				echo "Odpowiedź: ".$ankieta2['odpowiedz']."<br>";

				
			}
		}

?>
</div>
</body>
<footer class="container-fluid text-center" >
  <p>Strona poświęcona anonimowym ankietom.</p>
</footer>
</html>