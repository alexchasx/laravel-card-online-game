<?php

namespace Modules\CardGame\Repositories;

use App\Model\Card;
use App\Repositories\BaseRepository;

class CardRepository extends BaseRepository
{
    /**
     * @param Card $model
     */
    public function __construct(Card $model)
    {
        parent::__construct($model);
    }
}