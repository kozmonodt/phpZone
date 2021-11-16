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
            <p>ЛЕХА!</p>
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
            <li onmouseover="bigMenu(this)" onmouseout="normalMenu(this)"><a href="/about">О мне</a></li>
            <li onmouseover="bigMenu(this)" onmouseout="normalMenu(this)">
                <a href="/interests" onclick="myFunction()" class='dropbtn' " >Мои интересы</a>
                <ul id=" myDropdown" class="dropdown-content">
                    <li><a href="hobbies.html#Ходить">Ходить</a></li>
                    <li><a href="hobbies.html#Сидеть">Сидеть</a></li>
                    <li><a href="hobbies.html#Кушать">Кушать</a></li>
                    <li><a href="hobbies.html#Спать">Спать</a></li>
                </ul>
            </li>
            <li onmouseover="bigMenu(this)" onmouseout="normalMenu(this)"><a href="#">Учеба</a>
                <ul class="submenu">
                    <li><a href="/disciplines">Дисциплины</a></li>
                    <li><a href="/test">Пройти тест</a></li>
                </ul>
            </li>
            <li onmouseover="bigMenu(this)" onmouseout="normalMenu(this)"><a href="/photo">Фотоальбом</a></li>
            <li onmouseover="bigMenu(this)" onmouseout="normalMenu(this)"><a href="/contact">Контакты</a></li>
            <li onmouseover="bigMenu(this)" onmouseout="normalMenu(this)"><a href="/history">История</a></li>
            <li onmouseover="bigMenu(this)" onmouseout="normalMenu(this)"><a href="/guestBook">Гостевая книга</a></li>
        </ul>
    </nav>
</header>

<!--<head>
    <meta charset="UTF-8">
    <title>Мой блог</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>

<table class="layout">
    <tr>
        <td colspan="2" class="header">
            Мой блог
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right">
            <?/*= !empty($user) ? 'Привет, ' . $user->getNickname() . ' | ' . "<a href=\"/users/logout\">Выйти</a>" :
                "<a href=\"/users/login\">Войти</a>" . " | " .
                "<a href=\"/users/register\">Зарегистрироваться</a>"*/?>
        </td>
    </tr>
    <tr>
-->