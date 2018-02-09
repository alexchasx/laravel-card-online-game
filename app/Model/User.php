<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Modules\CardGame\Http\Entities\Avatar;
use Modules\CardGame\Http\Entities\CardSet;
use Modules\CardGame\Http\Entities\Rank;

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
 * @property string  $balance
 * @property integer $rememberTokenName
 *
 * @property Carbon  $created_at
 * @property Carbon  $updated_at
 * @property Carbon  $deleted_at
 *
 * @property Role    $role
 * @property Rank    $rank
 * @property Avatar  $avatar
 * @property CardSet $cardSet
 */
class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    const TABLE_NAME = 'users';

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_MANAGER = 'manager';
    const ROLE_BOT = 'bot';
    const ROLE_PAID_NAME = 'paid_name';

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

    /**
     * @return BelongsTo
     */
    public function avatar()
    {
        return $this->belongsTo(Avatar::class, 'avatar_id');
    }

    /**
     * @return BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * @return BelongsTo
     */
    public function rank()
    {
        return $this->belongsTo(Rank::class, 'rank_id');
    }

    /**
     * @param array $inputs
     *
     * @return bool
     */
    public function updateUser(array $inputs)
    {
        $user = $this->findOrFail($inputs['id']);

        if (!empty($inputs['password'])) {
            $inputs['password'] = $user->password;
        }

        if (!empty($inputs['name'])) {
            $inputs['name'] = $user->name;
        }

        return $user->update(array_except($inputs, [
            '_token',
        ]));
    }

    /**
     * @param User         $user
     * @param UploadedFile $file
     *
     * @return void
     */
    protected function uploadFile(self $user, UploadedFile $file = null)
    {
        if ($file) {
            $originalName = $file->getClientOriginalName();

            $basePath = $file->storeAs('upload', $originalName);

            $user->avatar = config('cardgame.avatar_path') . $basePath;

            $user->save();
        }
    }

    /**
     * @param string $column
     *
     * @return Collection[] | Model[]
     */
    public function getAll($column = 'name')
    {
        return $this->withTrashed()
            ->orderBy($column)
            ->get();
    }

    /**
     * @param $avatarId
     *
     * @return bool
     */
    public function changeAvatar($avatarId)
    {
        $this->avatar_id = $avatarId;

        return $this->save();
    }

    /**
     * @param Model $model
     *
     * @return float | null
     */
    public function changeBalance(Model $model)
    {
        $balanceAfter = floatval(Auth::user()->balance - $model->price);

        if ($balanceAfter < 0) {
            return null;
        }

        return $balanceAfter;
    }

}
