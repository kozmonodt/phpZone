<?php include __DIR__ . '/../header.php'; ?>
<td>
    <h1>Создание новой статьи</h1>
    <?php if(!empty($error)):?>
        <div style="color: red"><?=$error ?></div>
    <?php endif; ?>
    <form action="/articles/add" method="post">
        <label for="name">Название статьи</label><br>
        <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? ''?>" size="50"><br>
        <br>
        <label for="textarea">Текст статьи</label><br>
        <textarea name="text" id="text" cols="80" rows="10"><?= $_POST['textarea'] ?? '' ?></textarea><br>
        <br>
        <input type="submit" value="Создать">
    </form>
</td>
<?php include __DIR__ . '/../footer.php'; ?>