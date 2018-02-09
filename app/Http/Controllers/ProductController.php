<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProductController extends BaseController
{
    /**
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Factory | View
     */
    public function index()
    {
        return view('product.index', [
           'products' => $this->model->getAll(),
        ]);
    }

    /**
     * @var int $id
     *
     * @return View | HttpException
     */
    public function edit($id)
    {
        return view('product.update', [
            'race' => parent::edit($id),
        ]);
    }

}
