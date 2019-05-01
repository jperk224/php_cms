<?php

require 'partials/database.php';

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {

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
} else {
    $article = null;
}

?>

<?php require 'partials/header.php'; ?>

<?php if ($article === null) : ?>
    <p>Article was not found.</p>
<?php else : ?>
    <article>
        <h2><?= $article["title"]; ?></h2>
        <p><?= $article["content"]; ?></p>
    </article>
<?php endif; ?>

<?php require 'partials/footer.php'; ?>