<?php

namespace Modules\CardGame\Repositories;

use App\Repositories\BaseRepository;
use Modules\CardGame\Http\Entities\BattleField;

class BattleFieldRepository extends BaseRepository
{
    /**
     * @param BattleField $model
     */
    public function __construct(BattleField $model)
    {
        parent::__construct($model);
    }
}