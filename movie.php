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
    <div class="search search_movie">
        Search a movie by :
        <form action="movie.php" method="GET">
            <input type="text" name="contentName" id="contentname" required><br>
            <input type="radio" name="movie" value="name" checked>Name
            <input type="radio" name="movie" value="genre">Genre
            <input type="radio" name="movie" value="distribution">Distribution<br>
            <input type="submit" name="create" value="Search">
        </form>
        <?php include "db-movies.php";?>
    </div>
</body>
</html>