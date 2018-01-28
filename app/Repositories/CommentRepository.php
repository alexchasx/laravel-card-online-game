<?php

namespace App\Repositories;

use App\Model\Comment;

class CommentRepository extends BaseRepository
{
    /**
     * @param Comment $model
     */
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }
}