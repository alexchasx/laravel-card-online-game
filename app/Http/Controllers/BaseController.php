<?php

namespace App\Http\Controllers;

use App\Model\Ability;
use App\Model\CardSet;
use App\Model\Race;
use Illuminate\Database\Eloquent\Collection;
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

    /**
     * @return CardSet[] | Collection
     */
    protected function showCardSets()
    {
        return CardSet::query()
            ->where('hidden', false)
            ->orderBy('set_name')
            ->get();
    }

    /**
     * @return Race[] | Collection
     */
    protected function showRaces()
    {
        return Race::query()
            ->where('hidden', false)
            ->orderBy('name')
            ->get();
    }

    /**
     * @return Ability[] | Collection
     */
    protected function showAbilities()
    {
        return Ability::query()
            ->where('hidden', false)
            ->orderBy('name')
            ->get();
    }

}
