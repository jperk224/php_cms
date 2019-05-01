<?php

require 'partials/database.php';

if (isset($_GET["id"]) && is_numeric($_GET["id"])){

$sql = "SELECT *
        FROM articles
        WHERE id = " . $_GET["id"] . ";";

$results = mysqli_query ($connection, $sql);

if ($results === false) {
echo mysqli_error ($connection) . nl2br ('<br>');
echo mysqli_errno ($connection) . nl2br ('<br>');
} else {
$article = mysqli_fetch_assoc ($results);
}
} else {
    $article = null;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Blog</title>
</head>

<body>
    <header>
        <h1>My Blog</h1>
    </header>
    <main>
        <?php if ($article === null) : ?>
            <p>Article was not found.</p>
        <?php else : ?>
            <article>
                <h2><?= $article["title"]; ?></h2>
                <p><?= $article["content"]; ?></p>
            </article>
        <?php endif; ?>
    </main>
</body>

</html>