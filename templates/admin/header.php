<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Чёткий сайтик. Главная строничка</title>
    <link rel="stylesheet" href="/styles/style.css">
    <script src="/js/time.js"></script>
    <!--    <script src="/js/alert.js"></script>-->

</head>

<body onload="startTime(); addToHistory(); onLoad()">
<header>
    <div class="wrapperHeader">
        <div class="logo">
            <p>АДМИНКА!</p>
        </div>
        <div class="phone">
            <p>+79781234567</p>
        </div>
        <div class="search">
            <form action="#">
                <input type="text">
                <input type="submit" value="Отправить">
            </form>
        </div>
        <div class="clock" id="clock"></div>
    </div>
    <nav id="menu">
        <ul>
            <li id="active"><a href="/main">Главная</a></li>
            <li onmouseover="bigMenu(this)" onmouseout="normalMenu(this)"><a href="/posts">Редактор блога</a></li>
            <li onmouseover="bigMenu(this)" onmouseout="normalMenu(this)">
                <a href="/guestBookUpload">Загрузка сообщений гостевой книги</a>
            </li>
            <li onmouseover="bigMenu(this)" onmouseout="normalMenu(this)"><a href="/statistics/0">Статистика</a></li>
            <?= !empty($user) ? 'Привет, ' . $user->getNickname() . ' | ' . "<a href=\"/users/logout\">Выйти</a>" :
                "<a href=\"/users/login\">Войти</a>" . " | " .
                "<a href=\"/users/register\">Зарегистрироваться</a>"?>


        </ul>
    </nav>
</header>
<br><br>
