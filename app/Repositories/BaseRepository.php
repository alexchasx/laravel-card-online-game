<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Symfony\Component\HttpFoundation\Request;

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
     * @param      $column
     * @param null $operator
     * @param null $value
     *
     * @return Builder
     */
    public function withTrashedWhere($column, $operator = null, $value = null)
    {
        return $this->model->withTrashed()
            ->where($column, $operator, $value);
    }

    /**
     * @param string $className
     *
     * @param string $column
     *
     * @return Collection[] | Model[]
     */
    public function showEntitiesByClassName($className, $column = 'name')
    {
        return $className::query()
            ->where('seen', true)
            ->orderBy($column)
            ->get();
    }

    /**
     * @param Request $request
     *
     * @return void
     */
    public function create(Request $request)
    {
        if ($request->file('avatar')) {
            $originalName = $request->file('avatar')
                ->getClientOriginalName();

            $basePath = $request->file('avatar')
                ->storeAs('upload', $originalName);

            $card = $this->model->create(array_except($request->all(), ['avatar']));
            $card->avatar = config('cardgame.avatar_path') . $basePath;
            $card->save();

        } else {
            $this->model->create($request->all());
        }
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
     * @param  int  $id
     *
     * @param array $columns
     *
     * @return Model
     */
    public function getById($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);
    }
}