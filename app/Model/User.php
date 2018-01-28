<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\CardGame\Http\Entities\CardSet;

/**
 * @property integer $id
 * @property string  $name
 * @property integer $avatar_id
 * @property string  $email
 * @property string  $password
 * @property integer $role_id
 * @property integer $card_set_id
 * @property integer $rank_id
 * @property boolean $verified
 * @property string  $email_token
 * @property float   $rating
 * @property integer $count_wins
 * @property integer $count_battles
 * @property integer $prom
 * @property boolean $vip
 * @property boolean $seen
 * @property string  $price
 * @property integer $rememberTokenName
 *
 * @property Carbon  $created_at
 * @property Carbon  $updated_at
 * @property Carbon  $deleted_at
 *
 * @property Role    $role
 * @property Rank    $rank
 * @property File    $avatar
 * @property CardSet $cardSet
 */
class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    const TABLE_NAME = 'users';

    /**
     * Связанная с моделью таблица.
     *
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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'role',
        'remember_token',
    ];

}
