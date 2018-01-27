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

}
