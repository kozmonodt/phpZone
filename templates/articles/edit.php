<?php include __DIR__ . '/../header.php'; ?>
<td>
    <?php if(!empty($error)): ?>
        <div style="color: red"><?=$error ?></div>
    <?php endif; ?>
    <form action="/articles/<?= $article->getId() ?>/edit" method="post">
        <label for="name">Название статью</label>
        <input type="text" name="name" id="name" value="<?= $_POST['name'] ??  $article->getName()?>">
        <br>
        <label for="text" >Текст статьи</label><br>
        <textarea name="text" id="text" cols="80" rows="10"><?= $_POST['text'] ?? $article->getText()?></textarea><br>
        <br>
        <input type="submit" value="Обновить">
    </form>
</td>
<?php include __DIR__ . '/../footer.php'; ?>