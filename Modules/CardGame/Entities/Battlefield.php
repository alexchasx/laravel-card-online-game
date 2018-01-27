<?php

namespace Modules\CardGame\Http\Entities;

use App\Model\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string  $name
 * @property string  $avatar
 * @property string  $background
 * @property string  $description
 * @property string  $border
 * @property boolean $pay
 * @property boolean $hidden
 */
class Battlefield extends BaseModel
{
    use SoftDeletes;

    const TABLE_NAME = 'battlefield';

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
