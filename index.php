<?php
session_start();
?>


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
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
	  
    }
    
    /* Add a gray background color and some padding to the footer */
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

  /* Hide the carousel text when the screen is less than 600 pixels wide */
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
    <p>Twórz i wypełniaj ankiety bezpiecznie</p> 
  </div>   
</div>

<?php
	echo '<div class="container text-center" >';
	include('logowanie.php');

	if(isset($_SESSION['u_id'])){
		
		if(isset($_SESSION['czyAdmin']))
			header("location: admin.php");
		else
			header("location: zalogowany.php");
		
		
	}
	else{
		echo "Jesteś niezalogowany<br>";
		
		echo'
  <h2>Zaloguj się by korzystać ze strony</h2>
  
  <div class="col-sm-4">
  

  
   <div class="form-group">
<form method="POST" action="">
  <label for="usr">Login</label>
  <input type="text" name="login" required>
</div>
<div class="form-group">
  <label for="pwd">Hasło</label>
  <input type="password" name="haslo" required>
</div> 

  <input type="submit" name="loguj" value="Zaloguj">


   
</div>
<div class="col-sm-4">

    </div>
  <div class="col-sm-4">
  <h3> Nie masz jeszcze konta?</h3>
  <h3>Nic nie szkodzi</h3>
  <h3> Załóż je bezpłatnie</h3>
  <a href="rejestracja.php">
  <button type="button"  class="btn btn-warning" href="rejestracja.php" >Zarejestruj</button>
  </a>
    </div>

    </div>


</form>';
	}

?>





</body>
<footer class="container-fluid text-center" >
  <p>Strona poświęcona anonimowym ankietom.</p>
</footer>
</html>