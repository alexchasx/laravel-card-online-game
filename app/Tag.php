<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property integer   $id
 * @property string    $title
 * @property boolean   $status
 *
 * @property Article[] $articles
 */
class Tag extends BaseModel
{
    const TABLE_NAME = 'tags';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Атрибуты, для которых запрещено массовое назначение.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Статьи, принадлежащие тегу.
     *
     * @return BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany(
            Article::class,
            ArticleTag::TABLE_NAME,
            'tag_id',
            'article_id'
        );
    }
}
