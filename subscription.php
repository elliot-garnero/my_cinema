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
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>First Name</th>
            <th>Subscription</th>
        </tr>
    <?php
    $memberID = $_POST['id'];
    $pdo = new PDO("mysql:host=localhost;dbname=cinema", "root", "");
    if($pdo -> connect_errno)
    {
        echo "Failed to connect to Mysql: " . $pdo -> connect_error;
        exit();
    }
    $pdoIdRequest = "select id_perso, fiche_personne.nom, prenom, abonnement.nom as abo from fiche_personne inner join membre inner join abonnement on cinema.fiche_personne.id_perso = cinema.membre.id_fiche_perso and cinema.membre.id_abo = cinema.abonnement.id_abo where id_perso = $memberID;";
    $result = $pdo->query($pdoIdRequest);
    if($result->rowCount() > 0)
    {
        while($row = $result->fetch())
        {
            $resultId = $row['id_perso'];
            $resultName = $row['nom'];
            $resultFirstName = $row['prenom'];
            $resultSubscription = $row['abo'];
            echo "
                <tr>
                    <td>".$resultId."</td>
                    <td>".$resultName."</td>
                    <td>".$resultFirstName."</td>
                    <td>".$resultSubscription."</td>
                </tr>";
        }
    }
    else
    {
        echo "No result";
    }
    ?>
    </table>
    <form action="subscription-choice.php" method="POST" class="search">
        <p>Change <?php echo $resultFirstName;?>'s membership :</p> 
        <input type="hidden" name="id" value="<?php echo $resultId;?>">
        <input type="radio" name="membership" value="0">None
        <input type="radio" name="membership" value="1">VIP
        <input type="radio" name="membership" value="2">GOLD
        <input type="radio" name="membership" value="3">Classic
        <input type="radio" name="membership" value="4">Pass Day
        <input type="submit" value="Submit">
    </form>
</body>
</html>