<?php include_once __DIR__ . '/../header.php'?>
<div id="content">
    <?php if(!empty($error)):?>
        <div style="color: red"><?=$error ?></div>
    <?php endif; ?>
    <p style="font-weight: bolder;">Накалякать братве</p>
    <p>
    <form method="post" action="/contact/validateContactForm">
        <label id="">Напишите свое ФИО <span id="error_fio" class="noErrorHappen">*</span></label>
        <input type="text" id='fio' onblur="check_fio()" name='fio' value="<?= $_POST['fio'] ?? ''?>">
        <div class="popup-overlay">
            <div class="popup-content">
                <h2>Э слышь</h2>
                <p> Введи в виде: Пупкин Василий Васильевич</p>
            </div>
        </div>
        <br>
        Напишите свою почту <input type="text" id="email" name = 'email' value="<?= $_POST['email'] ?? ''?>">
        <br>
        <label id="">Напишите свой телефон <span id="error_tel" class="noErrorHappen">*</span></label>
        <input type="text" id="telefon" onblur="check_tel()" name = 'telefon' value="<?= $_POST['telefon'] ?? ''?>">
        <br>
        <p>
            Сколько Вам лет
            <select id="select" name = 'age'>
                <optgroup label="Адекваты">
                    <option value="c1">20-30</option>
                </optgroup>
                <optgroup label="Такое">
                    <option value="s1">такое</option>
                </optgroup>
            </select>
        </p>
        <br>
        Ваш пол М <input type="radio" name="gender" id="male">
        Ваш пол Ж <input type="radio" name="gender" id="female">
        <br>
        <p>Введите Ваш день рождения
            <br>
            <select id="years" onchange="callCallendarFunction()">
                <option value="1990" selected>1990</option>
                <option value="1991">1991</option>
            </select>
            <select id="months" onchange="callCallendarFunction()">
                <option value="1" selected>01</option>
                <option value="2">02</option>
            </select>
            <br>
            <input type="text" id="cal_output">
        <div id="calendar"></div>
        </p>
        <br>
        <textarea id="textarea" rows="4" cols="50"></textarea>
        <br>
        <input type="reset" value="Сбросить">
        <input type="submit" value="Отправить" id="submit">

    </form>
    <br>



</div>
<?php include_once __DIR__ . '/../footer.php'?>