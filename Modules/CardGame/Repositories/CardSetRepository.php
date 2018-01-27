<?php

namespace Modules\CardGame\Repositories;


use Modules\CardGame\Http\Entities\CardSet;
use App\Repositories\BaseRepository;

class CardSetRepository extends BaseRepository
{
    /**
     * @param CardSet $model
     */
    public function __construct(CardSet $model)
    {
        parent::__construct($model);
    }
}