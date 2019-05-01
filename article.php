<?php

$db_host = "localhost";
$db_name = "php_cms";
$db_user = "cms_www";
$db_password = "cn3WUv8WnxTwvzPo";

$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$connection) {
    echo "Error: Unable to connect to MySQL." . nl2br('<br>');
    echo "Debugging errno: " . mysqli_connect_errno() . nl2br('<br>'); //Error code
    echo "Debugging error: " . mysqli_connect_error() . nl2br('<br>'); //Error text
    exit;
}

echo "Success: A proper connection to MySQL was made!" . nl2br('<br>');
echo "Host information: " . mysqli_get_host_info($connection) . nl2br('<br>');

$sql = "SELECT *
        FROM articles
        WHERE id = " . $_GET["id"] . ";";

$results = mysqli_query($connection, $sql);

if ($results === false) {
    echo mysqli_error($connection) . nl2br('<br>');
    echo mysqli_errno($connection) . nl2br('<br>');
} else {
    $article = mysqli_fetch_assoc($results);
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