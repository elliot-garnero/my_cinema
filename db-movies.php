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
    $aboutContent = "genre";
    $movieContent_query = "select titre from cinema.film inner join cinema.genre on cinema.film.id_genre = cinema.genre.id_genre where nom like '%$movieContent%';";
}
elseif($movie == "distribution")
{
    $aboutContent = "distributors";
    $movieContent_query = "select titre from cinema.film inner join cinema.distrib on cinema.film.id_distrib = cinema.distrib.id_distrib where nom like '%$movieContent%';";
}

$result = $pdo->query($movieContent_query);
if($result->rowCount() > 0)
{
    echo "<p><br>Here's a list of asked $aboutContent :<br><br></p>";
    while($row = $result->fetch())
    {
        echo "<p>$row[$rowTitre]</p><br>";
    }
}
else
{
    echo "No results";
}
?>