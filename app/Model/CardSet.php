<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer   $id
 * @property string    $set_name
 * @property string    $avatar
 * @property boolean   $pay
 * @property boolean   $hidden
 *
 * @property Card[] $cards
 */
class CardSet extends BaseModel
{
    use SoftDeletes;

    const TABLE_NAME = 'card_sets';

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
     * @return HasMany
     */
    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
