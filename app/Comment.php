<?php

namespace App;

use Carbon\Carbon;
use Faker\Provider\Base;
use App\Presenters\DatePresenter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $target_id
 * @property string  $target_type
 * @property integer $user_id
 * @property string  $content
 * @property integer $level
 * @property integer $status
 *
 * @property Carbon   $created_at
 * @property Carbon   $updated_at
 * @property Carbon   $deleted_at
 */
class Comment extends BaseModel
{
    use DatePresenter;

    const TABLE_NAME = 'comments';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Возращает пользователя - владельца данного комментария
     *
     * @return belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
