<?php

namespace Modules\CardGame\Repositories;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Eloquent\BaseRepository;

class Repository extends BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

    public function model()
    {

    }

}