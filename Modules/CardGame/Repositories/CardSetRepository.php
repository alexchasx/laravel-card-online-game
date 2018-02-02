<?php

namespace Modules\CardGame\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
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

    /**
     * @param string $column
     *
     * @return Collection[] | Model[]
     */
    public function showEntities($column = 'name')
    {
        return self::with('user', 'races')
            ->withTrashed()
            ->orderBy($column)
            ->get();
    }
}