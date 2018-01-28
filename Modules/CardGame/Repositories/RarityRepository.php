<?php

namespace Modules\CardGame\Repositories;

use App\Repositories\BaseRepository;
use Modules\CardGame\Http\Entities\Rarity;

class RarityRepository extends BaseRepository
{
    /**
     * @param Rarity $model
     */
    public function __construct(Rarity $model)
    {
        parent::__construct($model);
    }
}