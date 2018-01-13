<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer   $id
 * @property string    $card_name
 * @property integer    $card_sets_id
 * @property string    $avatar
 * @property string    $ability
 * @property integer   $energy
 * @property integer   $attack
 * @property integer   $health_points
 * @property integer   $armor
 * @property string    $rarity
 * @property boolean   $pay
 * @property boolean   $hidden
 *
 * @property CardSet[] $cardSet
 */
class Card extends BaseModel
{
    use SoftDeletes;

    const TABLE_NAME = 'cards';

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
     * Возращает категорию данной статьи.
     *
     * @return BelongsTo
     */
    public function cardSet()
    {
        return $this->belongsTo(CardSet::class, 'card_sets_id');
    }
}
