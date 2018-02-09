<?php

namespace app\Services;

use App\Model\User;
use Illuminate\Database\Eloquent\Model;

class BalanceService
{
    /**
     * @param User  $user
     * @param Model $entity
     *
     * @return float
     */
    public function changeBalance(User $user, Model $entity)
    {
        return floatval($user->balance - $entity->price);
    }

}