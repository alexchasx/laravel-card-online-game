<?php

namespace App\Http\Controllers;

use App\Model\Ability;
use App\Model\CardSet;
use App\Model\CardType;
use App\Model\Race;
use App\Model\Rarity;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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
     * @param string $modelName
     *
     * @return Collection | Model[]
     */
    protected function showModels($modelName)
    {
        return $modelName::query()
            ->where('hidden', false)
            ->orderBy('name')
            ->get();
    }

}
