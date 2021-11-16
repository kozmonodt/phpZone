<?php include_once __DIR__ . '/../header.php'?>
    <link rel="stylesheet" href="/styles/styles.css">
    <div style="text-align: center;">
        <h1>Оставить отзыв</h1>
        <?php if (!empty($error)): ?>
            <div style="background-color: red;padding: 5px;margin: 15px"><?= $error ?></div>
        <?php endif; ?>
        <form action="/guestBook/newFeedback" method="post">
            <label>Фамилия <input type="text" name="surname" value="<?= $_POST['surname'] ?? '' ?>"></label>
            <br><br>
            <label>Имя <input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>"></label>
            <br><br>
            <label>Отчество <input type="text" name="middlename" value="<?= $_POST['middlename'] ?? '' ?>"></label>
            <br><br>
            <label>E-mail <input type="text" name="email" value="<?= $_POST['email'] ?? '' ?>"></label>
            <br><br>
            <label>Text <input type="text" name="text" value="<?= $_POST['text'] ?? '' ?>"></label>
            <br><br>
            <input type="submit" value="Отправить">
            <br><br>
        </form>
    </div>
    <table class="layout">
        <tr>
            <th class="header">ФИО</th>
            <th class="header">Текст отзыва</th>
        </tr>
        <?php foreach ($feedbacks as $feedback):?>
        <tr>
                <td>
                    <h3>
                        <?= $feedback->getSurname() ?>
                        <?= $feedback->getName() ?>
                        <?= $feedback->getMiddleName() ?>
                    </h3>
                </td>
                <td>
                    <p><?= $feedback->getText() ?></p>
                </td>
        </tr>
        <?php endforeach;?>

    </table>
<?php include_once __DIR__ . '/../footer.php'?>