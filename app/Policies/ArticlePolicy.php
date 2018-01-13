<?php

namespace App\Policies;

use App\Article;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

//    /**
//     * Create a new policy instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        //
//    }

//    /**
//     * Определяем, может ли данный пользователь удалить данную задачу.
//     *
//     * @param  User $user
//     *
//     * @return bool
//     */
//    public function index(User $user)
//    {
//        /**
//         * @var User $user
//         */
//        return $user->role === 'admin';
//    }
}
