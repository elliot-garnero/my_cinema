<?php
$server = "mysql:host=localhost;dbname=cinema";
$user = "root";
$pwd = "";
$pdo = new PDO($server, $user, $pwd);
if($pdo -> connect_errno)
{
    echo "Failed to connect to Mysql: " . $pdo -> connect_error;
    exit();
}

$movieContent = $_GET['contentName'];
$movie = $_GET['movie'];
$rowTitre = "titre";
if($movie == "name")
{
    $aboutContent = "movies";
    $movieContent_query = "select titre from film where titre like '%$movieContent%';";
}
elseif($movie == "genre")
{
    $aboutContent = "genres";
    $rowName = "nom";
    $movieContent_query = "select titre, nom from cinema.film inner join cinema.genre on cinema.film.id_genre = cinema.genre.id_genre where titre like '%$movieContent%';";
}
elseif($movie == "distribution")
{
    $aboutContent = "distributors";
    $rowName = "nom";
    $movieContent_query = "select titre, nom from cinema.film inner join cinema.distrib on cinema.film.id_distrib = cinema.distrib.id_distrib where titre like '%$movieContent%';";
}

$result = $pdo->query($movieContent_query);
if($result->rowCount() > 0)
{
    echo "<p><br>Here's a list of asked $aboutContent :<br><br></p>";
    while($row = $result->fetch())
    {
        echo "<p>$row[$rowTitre]<br>$row[$rowName]</p><br><br>";
    }
}
else
{
    echo "No results";
}
?>