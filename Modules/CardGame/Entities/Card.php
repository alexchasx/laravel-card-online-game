<?php

namespace Modules\CardGame\Http\Entities;

use App\Model\BaseModel;
use App\Model\File;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer   $id
 * @property string    $name
 * @property string    $avatar
 * @property boolean   $seen
 * @property integer   $card_sets_id
 * @property integer   $race_id
 * @property integer   $ability1_id
 * @property integer   $ability2_id
 * @property integer   $card_type_id
 * @property integer   $energy
 * @property integer   $attack
 * @property integer   $health
 * @property integer   $armor
 * @property integer   $rarity_id
 * @property string    $price
 *
 * @property Carbon    $deleted_at
 *
 * @property CardSet[] $cardSet
 * @property Race      $race
 * @property Ability   $ability1
 * @property Ability   $ability2
 * @property Rarity    $rarity
 * @property CardType  $cardType
 */
class Card extends BaseModel
{
    use SoftDeletes;

    const TABLE_NAME = 'cards';

    const SORT_ENERGY = 'energy';
    const SORT_ATTACK = 'attack';
    const SORT_HEALTH = 'health';

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
    public function cardSet()
    {
        return $this->belongsTo(CardSet::class, 'card_sets_id');
    }

    /**
     * @return BelongsTo
     */
    public function ability1()
    {
        return $this->belongsTo(Ability::class, 'ability1_id');
    }

    /**
     * @return belongsTo
     */
    public function ability2()
    {
        return $this->belongsTo(Ability::class, 'ability2_id');
    }

    /**
     * @return BelongsTo
     */
    public function rarity()
    {
        return $this->belongsTo(Rarity::class, 'rarity_id');
    }

    /**
     * @return BelongsTo
     */
    public function cardType()
    {
        return $this->belongsTo(CardType::class, 'card_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function race()
    {
        return $this->belongsTo(Race::class, 'race_id');
    }

    /**
     * @param string $column
     * @param string $column1
     * @param string $column2
     *
     * @return self
     */
    public function withTrashedAll(
        $column = self::SORT_ENERGY,
        $column1 = self::SORT_ATTACK,
        $column2 = self::SORT_HEALTH
    )
    {
        return $this->with(
            'cardSet',
            'ability1',
            'ability2',
            'rarity',
            'cardType',
            'race'
        )
            ->withTrashed()
            ->orderBy($column)
            ->orderBy($column1)
            ->orderBy($column2)
            ->get();
    }
}
