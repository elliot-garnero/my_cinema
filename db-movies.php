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
if($movie == "name")
{
    $aboutContent = "movies";
    $rowName = "titre";
    $movieContent_query = "select titre from film where titre like '%$movieContent%';";
}
elseif($movie == "genre")
{
    $aboutContent = "genres";
    $rowName = "nom";
    $movieContent_query = "select nom from genre where nom like '%$movieContent%';";
}
elseif($movie == "distribution")
{
    $aboutContent = "distributors";
    $rowName = "nom";
    $movieContent_query = "select nom from distrib where nom like '%$movieContent%';";
}

$result = $pdo->query($movieContent_query);
if($result->rowCount() > 0)
{
    echo "Here's a list of asked $aboutContent :<br><br>";
    while($row = $result->fetch())
    {
        echo $row[$rowName]."<br>";
    }
}
else
{
    echo "No results";
}
$pdo->close();
?>