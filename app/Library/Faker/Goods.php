<?php
namespace App\Library\Faker;

use Faker\Provider\Base;

class Goods extends Base
{

    protected static $safeGoodsNames = [
        'Кукурудза', 'Картопля', 'Вареники з картоплею',
        'Капуста', 'Смалець', 'Горiлка', 'Хрiн з редькою, солодкий',
        'Сало в шоколадi', 'Цибуля', 'Мед', 'Галушки',
        'Борщ', 'Сметана', 'Пампушки', 'Морква', 'Банани',
    ];

    public function myGoodsUa()
    {
        return static::randomElement(static::$safeGoodsNames);
    }
}
