<?php include_once __DIR__ . '/../header.php'?>
    <h1><?= $test->getFIO() ?></h1>
    <p><?= $test->getResults() ?></p>
    <p><?= $test->getAnswers() ?></p>
    <p><?= $test->getCreatedAt() ?></p>
<?php include_once __DIR__ . '/../footer.php'?>