<?php

namespace App\Repositories;

use App\Model\User;

class UserRepository extends BaseRepository
{
    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @param string $role
     *
     * @return bool
     */
    public function hasRole(string $role)
    {
        return $this->model->role === $role;
    }
}