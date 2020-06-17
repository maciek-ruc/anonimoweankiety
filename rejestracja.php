<!doctype html>
<html lang="pl-PL">
<head>
  <title>Anonimowe Ankiety</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
   
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
	  
    }
    
    
    footer {
      background-color: #17a2b8;
      padding: 25px;
	  position:absolute;
	  bottom:0;
		width:100%;
		height:60px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  

  
  </style>
</head>
<body>

<nav class="navbar navbar-inverse" style="background-color:#17a2b8; " >
  <div class="container-fluid">
    <div class="navbar-header">
	
      <button type="button"  class="navbar-toggle"   data-toggle="collapse" data-target="#myNavbar">
	  
        <span class="icon-bar" ></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="logo.png" ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Strona Główna</a></li>
      </ul>
    </div>
  </div>
</nav>




<div class="container text-center">
  <div class="jumbotron">
    <h1>Anonimowa ankieta</h1>      
    <p>Utwórz konto</p> 
  </div>   
</div>
<div class="container text-center">
<?php
include('polaczenie.php');
include('drukuj.php');

if(isset($_POST['rejestruj'])){
	$login=$_POST['login'];
	$haslo=$_POST['haslo'];
	
	$zaznacz="SELECT * FROM MR_uzytkownicy WHERE nazwa='$login'";
	$wykonaj=mysqli_query($connect, $zaznacz);
	$zlicz=mysqli_num_rows($wykonaj);
	
	if($zlicz>0){
		echo "Login jest już zajęty.<br>";
	}
	else{
		$zaznacz="SELECT * FROM MR_admin WHERE nazwa='$login'";
		$wykonaj=mysqli_query($connect, $zaznacz);
		$zlicz=mysqli_num_rows($wykonaj);
		if($zlicz>0){
			echo "Login jest już zajęty.<br>";
		} else{
			
			$hash = sha1($haslo);
			$dodaj="INSERT INTO MR_uzytkownicy(nazwa, haslo) VALUES('$login','$hash')";
			$x=mysqli_query($connect, $dodaj);
			if($x){
				echo "Zarejestrowano.<br>";
				
				header("location: index.php");
				
			}
			else{
				echo "Błąd tworzenia konta<br>";
			}
		}
	}
}
else{
	echo "Wypełnij formularz<br>";
}

?>
<div class="col-sm-4">

    </div>
<div class="col-sm-4">

 
<div class="form-group">
<form method="POST" action="">
<h2>Formularz rejestracji</h2>
<input type="text" name="login" placeholder="Wybierz login" required><br>
<input type="password" name="haslo" placeholder="Podaj hasło" required><br>
<input type="submit" name="rejestruj" value="Zarejestruj się"><br>
</form>
   </div>
</div>

<div class="col-sm-4">

    </div>
</div>
</body>
<footer class="container-fluid text-center" >
  <p>Strona poświęcona anonimowym ankietom.</p>
</footer>
</html>