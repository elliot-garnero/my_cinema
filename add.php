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
            <li><a href="movie.php">Search a movie</a></li>
        </ul>
    </nav>
    <form action="" method="GET" id="add-form">
        Name<input type="text" name="addName" required>
        First Name<input type="text" name="addFirstName" required>
        Birthdate<input type="date" name="addBirth" required>
        Email<input type="email" name="addEmail" required>
        Adress<input type="text" name="addAdress" required>
        Postcode<input type="text" name="addPost" required>
        City<input type="text" name="addCity" required>
        Country<input type="text" name="addCountry" required>
        <input type="submit" value="Submit">
    </form>
    <?php
    $addName = $_GET['addName'];
    $addFirstName = $_GET['addFirstName'];
    $addBirth = $_GET['addBirth'];
    $addEmail = $_GET['addEmail'];
    $addAdress = $_GET['addAdress'];
    $addPost = $_GET['addPost'];
    $addCity = $_GET['addCity'];
    $addCountry = $_GET['addCountry'];
    $pdo = new PDO("mysql:host=localhost;dbname=cinema", "root", "");
    if($pdo -> connect_errno)
    {
        echo "Failed to connect to Mysql: " . $pdo -> connect_error;
        exit();
    }
    //      Get the actual highest ID
    $getHighestId = "select max(id_perso) from fiche_personne;";
    $idResult = $pdo->query($getHighestId);
    while($row = $idResult->fetch())
    {
        $maxId = $row['max(id_perso)'];
    }
    $maxId += 1;

    $addSqlRequest = "insert into fiche_personne(id_perso, nom, prenom, date_naissance, email, adresse, cpostal, ville, pays) values ('$maxId', '$addName', '$addFirstName', '$addBirth', '$addEmail', '$addAdress', '$addPost', '$addCity', '$addCountry');";
    $result = $pdo->query($addSqlRequest);
    if($result == true)
    {
        echo "<p class='search'>User $addName, $addFirstName has been added to our database</p>";
    }
    ?>
</body>
</html>