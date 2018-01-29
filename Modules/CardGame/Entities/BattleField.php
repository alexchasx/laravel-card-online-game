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
 * @property string  $background
 * @property string  $avatar
 * @property integer $border_id
 * @property string  $description
 * @property boolean $seen
 * @property string  $price
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

    /**
     * @return BelongsTo
     */
    public function border()
    {
        return $this->belongsTo(File::class, 'border_id');
    }
}