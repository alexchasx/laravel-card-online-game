<?php

namespace Modules\CardGame\Repositories;


use Modules\CardGame\Http\Entities\Race;
use App\Repositories\BaseRepository;

class RaceRepository extends BaseRepository
{
    /**
     * @param Race $model
     */
    public function __construct(Race $model)
    {
        parent::__construct($model);
    }
}