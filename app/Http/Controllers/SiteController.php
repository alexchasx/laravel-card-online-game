<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use Illuminate\View\View;

class SiteController extends BaseController
{
    const EMPTY_IMAGE = 'upload/no-image.png';

    /**
     * Показывает все статьи
     *
     * GET /
     *
     * @return View
     */
    public function index()
    {
        return view('index')->with([
            'empty' => self::EMPTY_IMAGE,
        ]);
    }

    /**
     * Показывает одну статью
     *
     * GET /card.{id}
     *
     * @param $articleId
     *
     * @return $this
     */
    public function show($articleId)
    {
        die('show');
        /**
         * @var Article $article
         */
        $article = Article::findOrFail($articleId);
        $article->viewed += 1;
        $article->save();

        $articles = $this->allArticles();

        return view('card')->with([
            'card' => $article,
            'popular' => $this->popularArticles($articles),
            'recent' => $this->recentArticles($articles),
            'categories' => $this->showCategories(),
            'tags' => $this->showTags(),
            'image' => $this->getFiles($articleId),
            'comments' => $this->getComments($articleId),
            'empty' => self::EMPTY_IMAGE,
        ]);
    }

}
