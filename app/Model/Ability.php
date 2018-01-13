<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string  $name
 * @property string  $avatar
 * @property string  $description
 * @property string  $full_description
 * @property boolean $hidden
 */
class Ability extends Model
{
    use SoftDeletes;

    const TABLE_NAME = 'abilities';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * Атрибуты, для которых запрещено массовое назначение.
     *
     * @var array
     */
    protected $guarded = [];
}
