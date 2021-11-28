<?php include_once __DIR__ . '/../header.php'?>
    <h1><?= $test->getFIO() ?></h1>

    Результаты <p><?= $test->getResults() ?></p>
    Ответы <p><?= $test->getAnswers() ?></p>
    <p><?= $test->getCreatedAt() ?></p>
<?php include_once __DIR__ . '/../footer.php'?>