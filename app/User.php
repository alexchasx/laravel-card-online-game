<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer   $id
 * @property string    $name
 * @property string    $email
 * @property string    $password
 * @property string    $role
 * @property integer   $rememberTokenName
 * @property integer   $email_token
 * @property integer   $verified
 *
 * @property Carbon   $created_at
 * @property Carbon   $updated_at
 * @property Carbon   $deleted_at
 *
 * @property Article[] $articles
 * @property File[]    $files
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
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_token',
        'verified',
    ];

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
     * Возращает все статьи пользователя.
     *
     * @return HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'user_id');
    }

    /**
     * Возращает все комментарии пользователя.
     *
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    /**
     * Возращает все файлы пользователя.
     */
    public function files()
    {
        return $this->morphMany(File::class, 'target');
    }

//    /**
//     * Возращает аватарку пользователя.
//     *
//     * @return HasMany
//     */
//    public function avatar()
//    {
//        return $this->files->last();
//    }

}
