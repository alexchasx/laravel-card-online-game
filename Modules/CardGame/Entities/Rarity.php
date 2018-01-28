<?php

namespace Modules\CardGame\Http\Entities;

use App\Model\File;
use Carbon\Carbon;
use App\Model\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string  $name
 * @property integer $avatar_id
 * @property boolean $seen
 * @property string  $description
 * @property string  $price
 *
 * @property Carbon  $deleted_at
 */
class Rarity extends BaseModel
{
    use SoftDeletes;

    const TABLE_NAME = 'rarities';

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
