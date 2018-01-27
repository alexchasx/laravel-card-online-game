<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $column
     *
     * @return Collection
     */
    public function withTrashedOrderByDesc($column = 'id')
    {
        return $this->model->withTrashed()
            ->orderByDesc($column)
            ->get();
    }

    /**
     * @param  int $id
     *
     * @return void
     */
    public function destroy($id)
    {
        $this->getById($id)
            ->delete();
    }

    /**
     * @param  int $id
     *
     * @return Model
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }
}