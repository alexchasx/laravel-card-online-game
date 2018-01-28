<?php

namespace Modules\CardGame\Repositories;

use App\Repositories\BaseRepository;
use Modules\CardGame\Http\Entities\Role;

class RoleRepository extends BaseRepository
{
    /**
     * @param  Role $model
     */
    public function __construct( Role $model)
    {
        parent::__construct($model);
    }
}