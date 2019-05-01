<?php

require 'partials/database.php';

$sql = "SELECT *
        FROM articles
        ORDER BY published_at;";

$results = mysqli_query($connection, $sql);

if ($results === false) {
    echo mysqli_error($connection) . nl2br('<br>');
    echo mysqli_errno($connection) . nl2br('<br>');
} else {
    $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
}

?>

<?php require 'partials/header.php'; ?>
<?php if (empty($articles)) : ?>
    <p>No articles found.</p>
<?php else : ?>
    <ul>
        <?php foreach ($articles as $article) : ?>
            <li>
                <article>
                    <h2><a href="article.php?id=<?= $article["id"] ?>"><?= $article["title"]; ?></a></h2>
                    <p><?= $article["content"]; ?></p>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php require 'partials/footer.php'; ?>