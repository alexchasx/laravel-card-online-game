<?php

namespace Modules\CardGame\Http\Entities;

use App\Model\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $achievement_id
 * @property boolean $seen
 */
class UserAchievement extends BaseModel
{
    use SoftDeletes;

    const TABLE_NAME = 'user_achievement';

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
