<?php include_once __DIR__ . '/header.php' ?>
<?php foreach ($statistics as $statistic):?>
    <h2><?= $statistic->getHostName() ?> </h2>
    <p><?=$statistic->getWebPage() ?></p>
    <p><?=$statistic->getTimeStatistic() ?></p>
    <hr>
<?php endforeach;?>
    <!--Вывод модуля управления страницами-->
    <p>Всег страниц <?=$num_pages ?></p>
    <p>
        <a href="/statistics/<?=$page-1 ?>">Предыдущая</a>
        <?php
        for($i=1;$i <= $num_pages; $i++) {
            // текущую страницу выводим без ссылки
            if ($page+1 == $i) {
                echo  $i . ' ' ;
            }
            else {
                echo '<a href="' .'/statistics/' . $i-1 . '">' . $i . "</a> ";
            }
        }
        ?>
        <a href="/statistics/<?=$page+1 ?>">Следующая</a>
    </p>
<?php include_once __DIR__ . '/footer.php' ?>