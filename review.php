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
            <th>Birthdate</th>
            <th>Email</th>
            <th>Address</th>
            <th>Postcode</th>
            <th>City</th>
            <th>Country</th>
        </tr>
    <?php
    $memberID = $_POST['id'];
    $pdo = new PDO("mysql:host=localhost;dbname=cinema", "root", "");
    if($pdo -> connect_errno)
    {
        echo "Failed to connect to Mysql: " . $pdo -> connect_error;
        exit();
    }
    $pdoIdRequest = "select * from fiche_personne where id_perso = '$memberID'";
    $result = $pdo->query($pdoIdRequest);
    if($result->rowCount() > 0)
    {
        while($row = $result->fetch())
        {
            $resultId = $row['id_perso'];
            $resultName = $row['nom'];
            $resultFirstName = $row['prenom'];
            $birthDate = $row['date_naissance'];
            $email = $row['email'];
            $address = $row['adresse'];
            $postcode = $row['cpostal'];
            $city = $row['ville'];
            $country = $row['pays'];
            echo "
                <tr>
                    <td>".$resultId."</td>
                    <td>".$resultName."</td>
                    <td>".$resultFirstName."</td>
                    <td>".$birthDate."</td>
                    <td>".$email."</td>
                    <td>".$address."</td>
                    <td>".$postcode."</td>
                    <td>".$city."</td>
                    <td>".$country."</td>
                </tr>";
        }
    }
    else
    {
        echo "No result";
    }
    ?>
    </table>
</body>
</html>