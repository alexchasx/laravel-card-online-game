<?php

namespace Modules\CardGame\Repositories;

use Illuminate\Support\Collection;
use Modules\CardGame\Http\Entities\Card;
use App\Repositories\BaseRepository;

class CardRepository extends BaseRepository
{
    public $model;
    /**
     * @param Card $model
     */
    public function __construct(Card $model)
    {
        parent::__construct();

        $this->model = $model;
    }

    /**
     * @param string $column
     *
     * @return Collection
     */
    public function withTrashedOrderByDesc($column = 'id')
    {
        return $this->model->with(
            'cardSet',
            'ability1',
            'ability2',
            'rarity',
            'cardType',
            'race'
        )
            ->withTrashed()
            ->orderByDesc($column)
            ->get();
    }
}