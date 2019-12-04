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
        <?php
function card($titre, $image, $description, $lien)
{
    echo "<div class=\"col-lg-3 col-sm-12 col-md-6\">
       <div class=\"card\">
        <img class=\"card-img-top\" src=\"$image\" alt=\"Card image\">
            <div class=\"card-body\">
            <h4 class=\"card-title\">$titre</h4>
            <p class=\"card-text\">$description</p>
            <a href=\"$lien\" class=\"btn btn-primary\">Voir le film</a>
            <span class=\"badge badge-dark\">New</span>
         </div> </div> </div>";
}
?>
        <div class="container">
            <h1 class="jumbotron-heading">
                <?php
$site = "NetFlix";
echo $site;
?>
            </h1>
            <h2>Bonjours et bienvenue sur Netflix, meilleur site de streaming</h2>
        </div>
        <p class="lead text-muted">abonnement a 9,99 par mois seullement </p>
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
    <img src="net.jpg" alt="Dans les hautes herbes">
  </div>
  <div class="carousel-item">
    <img src="ant-man.jpg" alt="les 100">
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
    <div class="container">
        <div class="row">

            <?php
require "parametres.php";
$dbh = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
if (array_key_exists("annee", $_GET)) {
    $annee = $_GET["annee"];
    $req = $dbh->prepare("SELECT * FROM film WHERE annee=:annee");
    $req->bindParam(":annee", $annee);
    $req->execute();
    $films = $req;
} else {

    $req = $dbh->query("SELECT * FROM film WHERE 1");
    $films = $req;
}

if (array_key_exists("genre", $_GET)) {
    $genre = $_GET["genre"];
    $req = $dbh->prepare("SELECT * FROM film INNER JOIN genre ON film.genre_id = genre.id WHERE genre.libelle = $genre");
    $req->bindParam(":genre", $genre);
    $req->execute();
    $films = $req;
} else {

    $req = $dbh->query("SELECT * FROM film WHERE 1");
    $films = $req;
}

foreach ($films as $film) {

    card($film["titre"], $film["image"], $film["description"], $film["lien"]);
}

?>

        </div>
    </div>

    <script type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>