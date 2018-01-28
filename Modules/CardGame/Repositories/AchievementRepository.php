<?php

namespace Modules\CardGame\Repositories;

use App\Repositories\BaseRepository;
use Modules\CardGame\Http\Entities\Achievement;

class AchievementRepository extends BaseRepository
{
    /**
     * @param Achievement $model
     */
    public function __construct(Achievement $model)
    {
        parent::__construct($model);
    }
}