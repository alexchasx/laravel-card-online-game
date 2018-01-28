<?php

namespace App\Repositories;

use App\Model\Role;
use App\Model\User;

class RoleRepository extends BaseRepository
{
    /**
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    /**
     * @param User  $user
     *
     * @return Role
     */
    public function getByUser(User $user)
    {
        return $user->role;
    }
}