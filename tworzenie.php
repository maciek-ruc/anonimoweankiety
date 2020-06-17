<?php
include('header.php');

?>
<div class="container text-center">
  <div class="jumbotron">
    <h1>Stwórz własną ankietę</h1>      
  
  </div>   
</div>

<div class="container">


<div class="container text-center" >  

  
  <div class="col-sm-4">

   
</div>
<div class="col-sm-4">





<?php
include('dodajankiete.php');


if(!isset($_POST['ile'])){
	echo '

	<form method="POST" action="">
		<label>Ile będzie pytań? </label><input type="number" min="1" name="ile" required>
		<input type="submit" name="dalej0" value="Dalej"><br>
	</form>

	';
}
else{
	echo '

	<form method="POST" action="">
		<label>Tytuł: </label><input type="text" name="tytul" required><br>
		<label>Klucz: </label><input type="text" name="klucz" required><br>';
	
	
	for ($x = 1; $x <= (int)$_POST['ile']; $x++) {
		echo '<input type="text" name="pyt'.$x.'" required placeholder="Pytanie '.$x.'"><br>';
	}


	echo ' 
		<input type="hidden" name="ile" value="'.$_POST['ile'].'">
		<input type="submit" name="dalej1" value="Dodaj">
	</form>

	';
}

?>

    </div>
  <div class="col-sm-4">

    </div>

    </div>

</div>
</body>
<footer class="container-fluid text-center" >
  <p>Strona poświęcona anonimowym ankietom.</p>
</footer>
</html>