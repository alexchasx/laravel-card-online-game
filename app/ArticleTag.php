<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property integer $id
 * @property integer $article_id
 * @property integer $tag_id
 *
 * @property Carbon   $created_at
 * @property Carbon   $updated_at
 * @property Carbon   $deleted_at
 */
class ArticleTag extends BaseModel
{
    const TABLE_NAME = 'article_tag';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Атрибуты, для которых запрещено массовое назначение.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Возращает статью, владеющую данным тегом
     *
     * @return HasOne
     */
    public function article()
    {
        return $this->hasOne(Article::class, 'id');
    }
}
