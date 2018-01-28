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
 * @property integer $avatar_id
 * @property boolean $seen
 * @property string  $feature
 * @property string  $description
 * @property string  $price
 *
 * @property Carbon  $deleted_at
 */
class Race extends BaseModel
{
    use SoftDeletes;

    const TABLE_NAME = 'races';

    public $timestamps = false;

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

    /**
     * @return BelongsTo
     */
    public function avatar()
    {
        return $this->belongsTo(File::class, 'avatar_id');
    }
}
