<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string  $name
 * @property string  $avatar
 * @property boolean $seen
 * @property string  $price
 * @property string  $discount
 * @property integer $category_id
 * @property string  $description
 *
 * @property Carbon  $deleted_at
 */
class Product extends BaseModel
{
    use SoftDeletes;

    const TABLE_NAME = 'products';

    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
