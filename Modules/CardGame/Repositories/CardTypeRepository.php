<?php

namespace Modules\CardGame\Repositories;

use App\Repositories\BaseRepository;
use Modules\CardGame\Http\Entities\CardType;

class CardTypeRepository extends BaseRepository
{
    /**
     * @param CardType $model
     */
    public function __construct(CardType $model)
    {
        parent::__construct($model);
    }
}