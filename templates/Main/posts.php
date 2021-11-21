<?php include_once __DIR__ . '/../header.php'?>

    <h1>Создание новой статьи</h1>
    <?php if(!empty($error)):?>
        <div style="color: red"><?=$error ?></div>
    <?php endif; ?>
    <form action="/posts/add" method="post">
        <label for="name">Название статьи</label><br>
        <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? ''?>" size="50"><br>
        <br>
        <label for="text">Текст статьи</label><br>
        <textarea name="text" id="text" cols="80" rows="10"><?= $_POST['text'] ?? '' ?></textarea><br>
        <br>
        <label for="fileToUpload">Загрузить картинку</label><br>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br>
        <input type="submit" value="Создать">
    </form>
    <br><br>

    <?php foreach ($posts as $post):?>
        <h2><a href="/posts/<?= $post->getId() ?>"><?= $post->getName() ?>  </a></h2>
        <p><?=$post->getText()  ?></p>
        <hr>
    <?php endforeach;?>

<?php include_once __DIR__ . '/../footer.php'?>