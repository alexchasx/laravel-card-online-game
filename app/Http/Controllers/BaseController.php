<?php

namespace App\Http\Controllers;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BaseController extends Controller
{
    /**
     * @var BaseRepository
     */
    protected $repository;

    /**
     * @param BaseRepository $repository
     */
    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

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
     * @param Request $request
     *
     * @return RedirectResponse | HttpException
     */
    public function store(Request $request)
    {
        self::checkAdmin();

        // TODO сделать валидацию
//        $this->validate($request->all(), [
//            'set_name' => 'required|max:255',
//        ]);

        $this->repository->create($request);

        return redirect()->back();
    }

    /**
     * @param $id
     *
     * @return Model | null | static
     */
    public function edit($id)
    {
        self::checkAdmin();

        return $this->repository->withTrashedWhere('id', $id)
            ->first();
    }

    /**
     * Редактирует статью
     *
     * POST /admin/Card/update
     *
     * @param Request $request
     *
     * @return RedirectResponse | HttpException
     */
    public function update(Request $request)
    {
        self::checkAdmin();

        // TODO сделать валидацию
//        $this->validate($request, [
//            'title' => 'required|max:255',
//        ]);

        $this->repository->withTrashedWhere('id', $request->id)
            ->update(array_except($request->all(), ['_token']));

        return redirect()->back();
    }

    /**
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function destroy($id)
    {
        self::checkAdmin();

        $this->repository->getById($id)
            ->delete();

        return redirect()->back();
    }

    /**
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function forceDestroy($id)
    {
        self::checkAdmin();

        $this->repository->withTrashedWhere('id', $id)
            ->forceDelete();

        return redirect()->back();
    }

    /**
     * @param $id
     *
     * @return RedirectResponse | HttpException
     */
    public function restore($id)
    {
        self::checkAdmin();

        $this->repository->withTrashedWhere('id', $id)
            ->restore();

        return redirect()->back();
    }
}
