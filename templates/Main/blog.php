<?php include_once __DIR__ . '/../header.php'?>

    <?php foreach ($posts as $post):?>
        <h2><a href="/posts/<?= $post->getId() ?>"><?= $post->getName() ?>  </a></h2>
        <p><?=$post->getText() ?></p>
        <img src="/images/blog/<?=$post->getImage() ?>" alt="">
        <hr>
    <?php endforeach;?>
<!--Вывод модуля управления страницами-->
    <p>Всег страниц <?=$num_pages ?></p>
    <p>
        <a href="/blog/<?=$page-1 ?>">Предыдущая</a>
        <?php
            for($i=1;$i <= $num_pages; $i++) {
                // текущую страницу выводим без ссылки
                if ($page+1 == $i) {
                    echo  $i . ' ' ;
                }
                else {
                    echo '<a href="' .'/blog/' . $i-1 . '">' . $i . "</a> ";
                }
            }
        ?>
        <a href="/blog/<?=$page+1 ?>">Следующая</a>
    </p>

<?php include_once __DIR__ . '/../footer.php'?>