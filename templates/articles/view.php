<?php include __DIR__ . '/../header.php'; ?>
<td>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p><?= $article->getAuthor()->getNickName() ?></p>
</td>
<?php include __DIR__ . '/../footer.php'; ?>