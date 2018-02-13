<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Modules\CardGame\Http\Entities\Rank;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $rank_id
 * @property boolean $seen_rank
 *
 * @property User    $user
 * @property Rank    $rank
 */
class Provocation extends BaseModel
{
    const TABLE_NAME = 'provocations';

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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function rank()
    {
        return $this->belongsTo(Rank::class, 'rank_id');
    }

    /**
     * @param  int  $userId
     *
     * @param array $columns
     *
     * @return Model
     */
    public function getByUser($userId, $columns = ['*'])
    {
        return $this->where('user_id', $userId)
            ->first();
    }

    /**
     * @param string $column
     *
     * @return Collection[] | Model[]
     */
    public function getAllForUsers($column = 'id')
    {
        return $this->orderBy($column)
            ->get();
    }

    /**
     * @return Model
     */
    public function getOwner()
    {
        return $this->where('user_id', Auth::id())
            ->first();
    }
}
