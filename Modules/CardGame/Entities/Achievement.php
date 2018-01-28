<?php

namespace Modules\CardGame\Http\Entities;

use App\Model\BaseModel;
use App\Model\File;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string  $name
 * @property string  $description
 * @property integer $avatar_id
 * @property integer $sort
 * @property float   $rating
 * @property boolean $seen
 * @property string  $price
 *
 * @property Carbon  $deleted_at
 */
class Achievement extends BaseModel
{
    use SoftDeletes;

    const TABLE_NAME = 'achievements';

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

    /**
     * @return BelongsTo
     */
    public function avatar()
    {
        return $this->belongsTo(File::class, 'avatar_id');
    }
}
