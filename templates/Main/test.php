<?php include_once __DIR__ . '/../header.php'?>
    <div id="content">
        <p style="font-weight: bolder;">СевГУ</p>
        <p>ИС</p>
        <p>
        <form onsubmit="checkform(this)" method = 'post' action = "/test/validateTestClient">
            <?php if(!empty($error)):?>
                <div style="color: red"><?=$error ?></div>
            <?php endif; ?>
            Выберите свою группу

            <select name = 'group'>
                <optgroup label="Четкие">
                    <option value="ИСб-18-1-з">ИСб-18-1-з</option>
                </optgroup>
                <optgroup label="Нечеткие">
                    <option value="ИСб-18-2-з">ИСб-18-2-з</option>
                    <option value="ИСб-18-3-з">ИСб-18-3-з</option>
                    <option value="ИСб-18-4-з">ИСб-18-4-з</option>
                </optgroup>
            </select>
            <br>
            Напишите свое ФИО <input type="text" id="FIO" name = 'fio' value = "<?= $_POST['fio'] ?? ''?>">
            <br>
            <input type="submit" value="Отправить">
        </form>
        <form onsubmit="check_for_numbs()" method = "post" action = "/test/testResultsVerification">
            <?php if(empty($error)):?>
                <label name = "fio" ><?= $_POST['fio'] ?? ''?></label><br>
                <input type="hidden" id="postId" name="fio" value="<?= $_POST['fio'] ?? '' ?>">
                <?php
                    if(isset($_POST['fio'])){
                        session_start();
                        $SESSION_["fio"] = $_POST['fio'];
                    }
                ?>
            <?php endif; ?>

            <p>Сколько будет 2+2
            <div>
                <input type="radio" id="2" name="two_plus_two" value="2" checked>
                <label for="2">2</label>
            </div>
            <div>
                <input type="radio" id="3" name="two_plus_two" value="3">
                <label for="3">3</label>
            </div>
            <div>
                <input type="radio" id="4" name="two_plus_two" value="4">
                <label for="4">4</label>
            </div>
            </p>
            <p>Выберите четное число
                <select name='chislo'>
                    <optgroup label="Нечетные">
                        <option value="chet">1</option>
                        <option value="chet">3</option>
                        <option value="chet">5</option>
                    </optgroup>
                    <optgroup label="Четные">
                        <option value="nechet">2</option>
                        <option value="nechet">4</option>
                        <option value="nechet">6</option>
                        <option value="nechet">8</option>
                    </optgroup>
                </select>
            </p>
            <p>

            </p>
            <p>Что такое хорошо?
                <input type="text" name='plane_text' placeholder="Писать здесь">
            </p>
            <p><input type="reset"></p>
            <input type="submit" value="Отправить">
        </form>
    </div>
<?php include_once __DIR__ . '/../footer.php'?>