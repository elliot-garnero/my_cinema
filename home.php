<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
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
    <form action="home.php" method="GET" class="search">
        Name<input type="text" name="name">
        First Name<input type="text" name="firstname">
        <input type="submit" value="Search">
    </form>
    <div class="search table">
        <table>
            <tr>
                <th>Name</th>
                <th>First Name</th>
            </tr>
            <?php include "db-personnes.php"?>
        </table>
    </div>
</body>
</html>