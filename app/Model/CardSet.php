<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string  $set_name
 * @property string  $type
 * @property integer $user_id
 * @property integer $race_id
 * @property string  $avatar
 * @property string  $shirt
 * @property string  $background
 * @property string  $border
 * @property boolean $pay
 * @property boolean $hidden
 *
 * @property Card[]  $cards
 */
class CardSet extends BaseModel
{
    use SoftDeletes;

    const TABLE_NAME = 'card_sets';

    const TYPE_BASE = 'Базовый';
    const TYPE_NOT_BASE = 'Небазовый';

    const TYPES = [
        self::TYPE_BASE,
        self::TYPE_NOT_BASE,
    ];

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

    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
