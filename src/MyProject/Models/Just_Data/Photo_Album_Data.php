<?php

namespace MyProject\Models\Just_Data;

class Photo_Album_Data
{
    private static $titles = [
            'Дельфин','Пастор','Переплата',
            'Мазила','Тормоз','Опорник',
            'Пас назад','Навес','Хендо',
            'Криминал','Собака','Молодежь',
            'Жирафа','Доцик','Жопа'
        ];
    private static $sources = [
        'images/1.jpg','images/2.jpg','images/3.jpg',
        'images/4.jpg','images/5.jpg','images/6.jpg',
        'images/7.jpg','images/8.jpg','images/9.jpg',
        'images/10.jpg','images/11.jpg','images/12.jpg',
        'images/13.jpg','images/14.jpg','images/15.jpg'
    ];

    /**
     * @return string[]
     */
    public static function getTitles(): array
    {
        return self::$titles;
    }

    /**
     * @return string[]
     */
    public static function getSources(): array
    {
        return self::$sources;
    }

}