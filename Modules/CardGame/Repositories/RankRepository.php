<?php

namespace Modules\CardGame\Repositories;

use App\Repositories\BaseRepository;
use Modules\CardGame\Http\Entities\Rank;

class RankRepository extends BaseRepository
{
    /**
     * @param Rank $model
     */
    public function __construct(Rank $model)
    {
        parent::__construct($model);
    }
}