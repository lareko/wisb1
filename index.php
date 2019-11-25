<!DOCTYPE html>
<html>
<head>
	<title> Page films WIS B1 </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
  <body>

	  <section class="jumbotron text-center">

	      <div class="container">

	            <h1 class "jumbotron-heading">
	                <?php

              $site = "Netflix";
              echo $site;
                  ?>

	            </h1>

	      </div>

	              <h2> Bonjour </h2>
	              <p class= "lead text-muted"> Netflix vous propose des films et des séries ! </p>

      </section>

        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->

            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
  
            <div class="carousel-inner">

                <div class="carousel-item active">

                  <img src="89435607_o.jpg" alt="Dans les hautes herbes">

                </div>

                <div class="carousel-item">

                  <img src="89435607_o.jpg" alt="les 100">

                </div>

                <div class="carousel-item">
      
                  <img src="89435607_o.jpg" alt=" ">
    
                </div>

              </div>

            <!-- Left and right controls -->

                    <a class="carousel-control-prev" href="#demo" data-slide="prev">

                          <span class="carousel-control-prev-icon"></span>
  
                    </a>
  
                    <a class="carousel-control-next" href="#demo" data-slide="next">
    
                          <span class="carousel-control-next-icon"></span>
 
                     </a>

                </div>
  
                      <?php
                        
                          function card($titre, $image, $description)
                          {

                          echo "<div class=\"col-lg-3 col-sm-12 col-md-6\">
                <div class=\"card\">
                          <img class=\"card-img-top\" src=\"$image\" alt=\"Card image\">
                  
                <div class=\"card-body\">
                          <h4 class=\"card-title\"> $titre </h4>
                          <p class=\"card-text\"> $description </p>
                          <a href=\"#\" class=\"btn btn-primary\"> accéder </a>
 
                </div>
                </div>
                </div>";

}
?>


<div class="container">
	<div class="row">
    <?php

  $film1 = ["titre"=>"The 100","image"=>"the 100 2.jpg","description"=>"bonne série"];
  $film2 = ["titre"=>"Dans les hautes herbes","image"=>"net.jpg","description"=>"bon film"];
  $film3 = ["titre"=>"riverdale","image"=>"riverdale.jpg","description"=>"super show"];
  $film4 = ["titre" => "Le Roi Lion","image" => "https://image.tmdb.org/t/p/original/7QqLsDKe3myax9mfQf5EvJ2qk6u.jpg","description" => "super",];

  require("parametres.php");

  $dbh=new PDO ("mysql:host=$host;dbname=$dbname",$login,$password);

  if (array_key_exists("annee", $_GET)){
    $annee=$_GET["annee"];
    $req = $dbh -> prepare(
      "SELECT * FROM film WHERE annee = :annee");
    $req->bindParam(":annee",$annee);
    $req->execute();
    $films=$req;
  }

  else{

  $req=$dbh -> query ("SELECT * FROM film");
  $films=$req;
  }

  $films2=[$film1,$film2,$film3,$film4];

  foreach ($films as $film){
    card($film["titre"],$film["image"],$film["description"]);
  }

?>
	</div>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>