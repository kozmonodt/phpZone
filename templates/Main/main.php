<?php include_once __DIR__ . '/../header.php'?>
<td>
    <?php foreach ($articles as $article):?>
        <h2><a href="/articles/<?= $article->getId() ?>"><?= $article->getName() ?>  </a></h2>
        <p><?=$article->getText()  ?></p>
        <hr>
    <?php endforeach;?>
</td>
<?php include_once __DIR__ . '/../footer.php'?>

