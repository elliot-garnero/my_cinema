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
    <h1>BONUS</h1>
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
    $birthDate = substr($birthDate, 0, 10);
    ?>
    </table>
    <form action="modify.php" method="POST" class="search">
        ID<input type="number" name="modifyId" value="<?php echo $resultId; ?>">
        Name<input type="text" name="modifyName" value="<?php echo $resultName; ?>">
        First Name<input type="text" name="modifyFirstName" value="<?php echo $resultFirstName; ?>">
        Birthdate<input type="date" name="modifyBirthdate" value="<?php echo $birthDate; ?>">
        Email<input type="email" name="modifyEmail" value="<?php echo $email; ?>"><br>
        Adress<input type="text" name="modifyAdress" value="<?php echo $address; ?>">
        Postcode<input type="number" name="modifyPostcode" value="<?php echo $postcode; ?>">
        City<input type="text" name="modifyCity" value="<?php echo $city; ?>">
        Country<input type="text" name="modifyCountry" value="<?php echo $country; ?>"><br>
        Membership
        <select>
            <option value="1">VIP</option>
            <option value="2">GOLD</option>
            <option value="3">Classic</option>
            <option value="4">Pass day</option>
        </select> 
        <input type="submit" value="Update" name="submit">
    </form>
    <?php
    $modifyId = $_POST['modifyId'];
    $modifyName = $_POST['modifyName'];
    $modifyFirstName = $_POST['modifyFirstName'];
    $modifyBirthdate = $_POST['modifyBirthdate'];
    $modifyEmail = $_POST['modifyEmail'];
    $modifyAdress = $_POST['modifyAdress'];
    $modifyPostcode = $_POST['modifyPostcode'];
    $modifyCity = $_POST['modifyCity'];
    $modifyCountry = $_POST['modifyCountry'];

    $pdo2 = new PDO("mysql:host=localhost;dbname=cinema", "root", "");
    if($pdo2 -> connect_errno)
    {
        echo "Failed to connect to Mysql: " . $pdo2 -> connect_error;
        exit();
    }

    //refaire la requette sql
    ?>
</body>
</html>