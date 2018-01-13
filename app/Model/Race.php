<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string  $name
 * @property string  $avatar
 * @property string  $feature
 * @property string  $description
 * @property boolean $pay
 * @property boolean $hidden
 */
class Race extends BaseModel
{
    use SoftDeletes;

    const TABLE_NAME = 'races';

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
