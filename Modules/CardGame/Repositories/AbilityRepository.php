<?php

namespace Modules\CardGame\Repositories;


use Modules\CardGame\Http\Entities\Ability;
use App\Repositories\BaseRepository;

class AbilityRepository extends BaseRepository
{
    /**
     * @param Ability $model
     */
    public function __construct(Ability $model)
    {
        parent::__construct($model);
    }
}