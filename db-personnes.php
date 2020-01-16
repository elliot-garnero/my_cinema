<?php
$userName = $_GET['name'];
$userFirstName = $_GET['firstname'];
$pdo = new PDO("mysql:host=localhost;dbname=cinema", "root", "");
if($pdo -> connect_errno)
{
    echo "Failed to connect to Mysql: " . $pdo -> connect_error;
    exit();
}

if($userFirstName == "")
{
    $pdoNameRequest = "select * from fiche_personne where nom like '%$userName%';";
}
else
{
    $pdoNameRequest = "select * from fiche_personne where nom like '%$userName%' and prenom like '%$userFirstName%';";
}

$result = $pdo->query($pdoNameRequest);
if($result->rowCount() > 0)
{
    while($row = $result->fetch())
    {
        $resultId = $row['id_perso'];
        $resultName = $row['nom'];
        $resultFirstName = $row['prenom'];
        echo "
            <tr>
                <td id=".$resultName.">".$resultName."</td>
                <td id=".$resultFirstName.">".$resultFirstName."</td>
                <td class=\"plusButton\"><a href=\"id-personnes.php?id=$resultId\">Plus</a></td>
            </tr>";
    }
}
else
{
    echo "No result";
}
$pdo->close();