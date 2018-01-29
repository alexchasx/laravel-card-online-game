<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SiteController extends Controller
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
        return redirect('login');
    }

}
