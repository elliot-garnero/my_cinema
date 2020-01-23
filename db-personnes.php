<?php
$userName = $_GET['name'];
$userFirstName = $_GET['firstname'];
$pdo = new PDO("mysql:host=localhost;dbname=cinema", "root", "");
if($pdo -> connect_errno)
{
    echo "Failed to connect to Mysql: " . $pdo -> connect_error;
    exit();
}
if(empty($userName) && empty($userFirstName))
{
    exit;
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
    echo "<tr>
            <th>Name</th>
            <th>First Name</th>
            <th>Email</th>
            <th>Plus</th>
            <th>Make a change</th>
        </tr>";
    while($row = $result->fetch())
    {
        $resultId = $row['id_perso'];
        $resultName = $row['nom'];
        $resultFirstName = $row['prenom'];
        $resultMail = $row['email'];
        echo "
            <tr>
                <td>".$resultName."</td>
                <td>".$resultFirstName."</td>
                <td>".$resultMail."</td>
                <td class=\"plusButton\"><form action=\"id-personnes.php\" method=\"POST\"><button type=\"submit\" id=\"plusButton\" name=\"id\" value=\"$resultId\">See</button></form></td>
                <td id=\"moretd\">
                    <form action=\"modify.php\" method=\"POST\"><button type=\"submit\" id=\"updatebutton\" name=\"id\" value=\"$resultId\">Update</button></form>
                    <form action=\"delete.php\" method=\"POST\"><button type=\"submit\" id=\"deletebutton\" name=\"id\" value=\"$resultId\">Delete</button></form>
                    <form action=\"subscription.php\" method=\"POST\"><button type=\"submit\" id=\"plusButton\" name=\"id\" value=\"$resultId\">Subscription</button></form>
                    </td>
            </tr>";
    }
}
else
{
    echo "No result";
}