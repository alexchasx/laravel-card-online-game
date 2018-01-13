<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Comment;
use App\File;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BaseController extends Controller
{
    /**
     * Проверяет пользователя на наличие администраторских прав
     *
     * @return true
     *
     * @throws HttpException
     */
    public static function checkAdmin()
    {
        if (\Auth::check() && isAdmin()) {
            return true;
        }

        abort(403, 'Доступ запрещён!');
    }

}
