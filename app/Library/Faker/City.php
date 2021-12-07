<?php
namespace App\Library\Faker;

use Faker\Provider\Base;

class City extends Base
{

    protected static $city = [
        'Вінниця',
        'Луцьк',
        'Дніпро',
        'Донецьк',
        'Житомир',
        'Ужгород',
        'Запоріжжя',
        'Івано-Франківськ',
        'Київ',
        'Кропивницький',
        'Луганськ',
        'Львів',
        'Миколаїв',
        'Одеса',
        'Полтава',
        'Рівне',
        'Суми',
        'Тернопіль',
        'Харків',
        'Херсон',
        'Хмельницький',
        'Черкаси',
        'Чернівці',
        'Чернігів',
    ];

    public function myCityUa()
    {
        return static::randomElement(static::$city);
    }
}
