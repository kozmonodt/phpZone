<?php include_once __DIR__ . '/../header.php'?>

    <?php foreach ($posts as $post):?>
        <h2><a href="/posts/<?= $post->getId() ?>"><?= $post->getName() ?>  </a></h2>
        <p><?=$post->getText()  ?></p>
        <hr>
    <?php endforeach;?>

<?php include_once __DIR__ . '/../footer.php'?>