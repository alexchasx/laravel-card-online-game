<?php

namespace Modules\CardGame\Http\Entities;

use App\Model\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string  $avatar
 * @property string  $price
 * @property boolean $seen
 * @property integer $user_id
 *
 * @property Carbon  $deleted_at
 */
class Avatar extends BaseModel
{
    use SoftDeletes;

    const TABLE_NAME = 'avatars';

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
