<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>My Cinema</title>
</head>
<body>
    <h1>WELCOME TO MY CINEMA</h1>
    <nav>
        <ul>
            <li><a href="home.php">Search a member</a></li>
            <li><a href="tonight.php">Airing tonight</a></li>
            <li><a href="movie.php">Search a movie</a></li>
        </ul>
    </nav>
    <?php
    $pdo = new PDO("mysql:host=localhost;dbname=cinema", "root", "");
    if($pdo -> connect_errno)
    {
        echo "Failed to connect to Mysql: " . $pdo -> connect_error;
        exit();
    }
    $request = "select titre, resum from film order by id_film desc limit 7";
    $result = $pdo->query($request);
    while($row = $result->fetch())
    {
        echo "<div class=\"search\"><p>".$row['titre']."</p><p>".$row['resum']."</p></div>";
    }
    ?>
</body>
</html>