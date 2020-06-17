<?php
include('header.php');

?>


<div class="container text-center">
  <div class="jumbotron">
    <h1>Twoje ankiety</h1>      
    <p> <?php 
echo "Witaj ".$_SESSION['u_login'].", sprawdź swoje ankiety.<br>";



?></p> 



  </div>   
</div>


<div class="container text-center" >  

  
  <div class="col-sm-4">
<p>Twoje ankiety:</p>


<?php
	$uid = $_SESSION['u_id'];
	$zaznacz="SELECT * FROM MR_ankiety WHERE ID_autora='$uid'";
	$wykonaj=mysqli_query($connect, $zaznacz);
	$zlicz=mysqli_num_rows($wykonaj);
	if($zlicz<1){
		echo "Nie znaleziono żadnej ankiety<br>";
	}
	else{
		while($ankieta = mysqli_fetch_assoc($wykonaj)){
			$id_ankiety = $ankieta['ID_ankiety'];
			echo $ankieta['tytul']."
			<form method='POST' action='ankieta.php'>
			<input type='hidden' name='id_ankiety' value='$id_ankiety'>
			<input type='submit' value='Wyniki'>
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


    </div>
  <div class="col-sm-4">
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