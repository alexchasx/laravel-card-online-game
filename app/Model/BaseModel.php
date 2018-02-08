<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class BaseModel extends Model
{
    /**
     * @param string $column
     *
     * @return Collection[] | Model[]
     */
    public function getAll($column = 'name')
    {
        return $this->withTrashed()
//            ->with('user')  //TODO доделать!
            ->orderBy($column)
            ->get();
    }
    /**
     * @param string $column
     *
     * @return Collection[] | Model[]
     */
    public function getAllForUsers($column = 'id')
    {
        return $this->where('seen', true)
            ->orderBy($column)
            ->get();
    }

    /**
     * @param string $column
     *
     * @return Collection
     */
    public function withTrashedOrderByDesc($column = 'id')
    {
        return $this->withTrashed()
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
        return $this->withTrashed()
            ->where($column, $operator, $value);
    }

    /**
     * @param array               $inputs
     * @param UploadedFile | null $file
     *
     * @return void
     */
    public function createModel(array $inputs, UploadedFile $file = null)
    {
        $model = $this->create(array_except($inputs, ['avatar']));

        $this->uploadFile($model, $file);
    }

    /**
     * @param UploadedFile $file
     * @param Model        $model
     *
     * @return void
     */
    protected function uploadFile(Model $model, UploadedFile $file = null)
    {
        if ($file) {
            $originalName = $file->getClientOriginalName();

            $basePath = $file->storeAs('upload', $originalName);

            $model->avatar = config('cardgame.avatar_path') . $basePath;

            $model->save();
        }
    }

    /**
     * @param array        $inputs
     *
     * @param UploadedFile $file
     *
     * @return void
     */
    public function updateModel(array $inputs, UploadedFile $file = null)
    {
        $model = $this->withTrashedWhere('id', $inputs['id'])
            ->first();

        $model->update(array_except($inputs, ['avatar', '_token']));

        $this->uploadFile($model, $file);
    }

    /**
     * @param  int $id
     *
     * @return void
     */
    public function destroyModel($id)
    {
        $this->getById($id)
            ->delete();
    }

    /**
     * @param $id
     */
    public function forceDestroyModel($id)
    {
        $this->withTrashedWhere('id', $id)
            ->forceDelete();
    }

    /**
     * @param $id
     */
    public function restoreModel($id)
    {
        $this->withTrashedWhere('id', $id)
            ->restore();
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
        return $this->findOrFail($id, $columns);
    }
}