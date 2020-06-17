<?php
include('polaczenie.php');
include('wyloguj.php');

session_start();
?>


<?php
	if(!isset($_SESSION['u_id']))
		header("location: index.php");
?>

<html lang="pl">
<head>
  <title>Anonimowe Ankiety</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  
    body{
		margin-bottom: 100px;
	}
  
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
	  
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #17a2b8;
      padding: 25px;
	  position:fixed;
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
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Strona Główna</a></li>
        <li><a href="tworzenie.php" style="background-color:#ffc107; color:black">Stwórz ankiete</a></li>
        <li><a href="wypelnianie.php" style="background-color:#ffc107; color:black">Wypełnij ankiete</a></li>
       
      </ul>

<ul class="nav navbar-nav navbar-right">
<form method="POST" action="">
	<input type="submit" name="wyloguj" value="Wyloguj">
</form>
        
      </ul>
    </div>
  </div>
</nav>