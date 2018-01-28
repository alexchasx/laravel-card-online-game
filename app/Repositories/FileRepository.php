<?php

namespace App\Repositories;

use App\Model\File;

class FileRepository extends BaseRepository
{
    /**
     * @param File $model
     */
    public function __construct(File $model)
    {
        parent::__construct($model);
    }
}