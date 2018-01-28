<?php

namespace Modules\CardGame\Http\Entities;

use App\Model\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string  $name
 * @property integer $avatar_id
 * @property boolean $seen
 * @property string  $description
 * @property string  $price
 * @property integer $background_id
 * @property integer $border_id
 *
 * @property Carbon  $deleted_at
 */
class BattleField extends BaseModel
{
    use SoftDeletes;

    const TABLE_NAME = 'battlefields';

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