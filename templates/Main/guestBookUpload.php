<?php include_once __DIR__ . '/../header.php'?>
    <form action="/guestBookUpload/upload" method="post" enctype="multipart/form-data">
        Выберите файл для загрузки:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Загрузить отзывы" name="submit">
    </form>
<?php include_once __DIR__ . '/../footer.php'?>