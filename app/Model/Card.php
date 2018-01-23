<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer   $id
 * @property string    $card_name
 * @property integer   $card_sets_id
 * @property integer   $race_id
 * @property string    $avatar
 * @property integer   $ability1_id
 * @property integer   $ability2_id
 * @property integer   $card_type_id
 * @property integer   $energy
 * @property integer   $attack
 * @property integer   $health_points
 * @property integer   $armor
 * @property integer   $rarity_id
 * @property boolean   $pay
 * @property boolean   $hidden
 *
 * @property CardSet[] $cardSet
 * @property Race[]    $race
 * @property Ability   $ability1
 * @property Ability   $ability2
 * @property Rarity    $rarity
 * @property CardType  $cardType
 */
class Card extends BaseModel
{
    use SoftDeletes;

    const TABLE_NAME = 'cards';

    const TYPE_MANPOWER = 'Живая сила';
    const TYPE_TECHNIQUE = 'Техника';
    const TYPE_TACTIC = 'Тактика';
    const TYPE_ENERGY = 'Энергетическое';
    const TYPE_CYBORG = 'Киборг';
    const TYPE_BIOMASS = 'Биомасса';
    const TYPE_MASSIVE = 'Массивное';
    const TYPE_WEAPONS = 'Оружие';
    const TYPE_MERCENARY = 'Наемник';
    const TYPE_SHELTER = 'Укрепление';

    const TYPES = [
        self::TYPE_MANPOWER,
        self::TYPE_TECHNIQUE,
        self::TYPE_TACTIC,
        self::TYPE_ENERGY,
        self::TYPE_CYBORG,
        self::TYPE_BIOMASS,
        self::TYPE_MASSIVE,
        self::TYPE_WEAPONS,
        self::TYPE_MERCENARY,
        self::TYPE_SHELTER,
    ];

    const RARITY_NORMAL = 'Обычная';
    const RARITY_UNUSUAL = 'Необычная';
    const RARITY_RARE = 'Редкая';
    const RARITY_MASTERPIECE = 'Шедевральная';
    const RARITY_LEGENDARY = 'Легендарная';

    const RARITIES = [
        self::RARITY_NORMAL,
        self::RARITY_UNUSUAL,
        self::RARITY_RARE,
        self::RARITY_MASTERPIECE,
        self::RARITY_LEGENDARY,
    ];

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
     * Возращает категорию данной статьи.
     *
     * @return BelongsTo
     */
    public function race()
    {
        return $this->belongsTo(Race::class, 'race_id');
    }
}
