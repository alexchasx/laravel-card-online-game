<?php

namespace Modules\CardGame\Http\Entities;

use Carbon\Carbon;
use App\Model\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer   $id
 * @property string    $name
 * @property string    $image
 * @property string    $description
 * @property boolean   $hidden
 *
 * @property Carbon   $deleted_at
 */
class CardType extends BaseModel
{
    use SoftDeletes;

    const TABLE_NAME = 'card_types';


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
