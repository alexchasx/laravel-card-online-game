<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer   $id
 * @property string    $name
 * @property string    $image
 * @property string    $description
 * @property boolean   $hidden
 *
 * @property Carbon   $deleted_at
 */
class CardType extends Model
{
    use SoftDeletes;

    const TABLE_NAME = 'card_types';


    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    public $timestamps = false;

    /**
     * Атрибуты, для которых запрещено массовое назначение.
     *
     * @var array
     */
    protected $guarded = [];
}
