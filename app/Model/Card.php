<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer   $id
 * @property string    $card_name
 * @property integer   $card_sets_id
 * @property integer   $race_id
 * @property string    $avatar
 * @property integer   $ability1_id
 * @property integer   $ability2_id
 * @property string    $type
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

    const TYPE_MANPOWER = 'manpower';
    const TYPE_TECHNIQUE = 'technique';
    const TYPE_TACTIC = 'tactic';
    const TYPE_ENERGY = 'energy';
    const TYPE_CYBORG = 'cyborg';
    const TYPE_BIOMASS = 'biomass';
    const TYPE_MASSIVE = 'massive';

    const TYPES = [
        self::TYPE_MANPOWER,
        self::TYPE_TECHNIQUE,
        self::TYPE_TACTIC,
        self::TYPE_ENERGY,
        self::TYPE_CYBORG,
        self::TYPE_BIOMASS,
        self::TYPE_MASSIVE,
    ];

    const RARITY_NORMAL = 'normal';
    const RARITY_UNUSUAL = 'unusual';
    const RARITY_RARE = 'rare';
    const RARITY_LEGENDARY = 'legendary';

    const RARITIES = [
        self::RARITY_NORMAL,
        self::RARITY_UNUSUAL,
        self::RARITY_RARE,
        self::RARITY_LEGENDARY,
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

    /**
     * Возращает категорию данной статьи.
     *
     * @return BelongsTo
     */
    public function cardSet()
    {
        return $this->belongsTo(CardSet::class, 'card_sets_id');
    }

    /**
     * Возращает категорию данной статьи.
     *
     * @return BelongsTo
     */
    public function race()
    {
        return $this->belongsTo(Race::class, 'race_id');
    }
}
