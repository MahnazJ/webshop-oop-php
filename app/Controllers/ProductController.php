<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\View;
use App\Models\ProductModel;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductModel::load()->all();

        return View::render('products/index.view', [
            'products'  => $products,
        ]);
    }

    public function create()
    {
        
    }

    public function store()
    {
        $product = $_POST;

        $product['user_id'] = Helper::getUserIdFromSession();
        $product['created'] = date('Y-m-d H:i:s');
        $product['created_by'] = Helper::getUserIdFromSession();

        ProductModel::load()->store($product);
    }

    public function edit()
    {
        $productId = Helper::getIdFromUrl('product');

        $product = ProductModel::load()->get((int)$productId);
        
        return View::render('products/edit.view', [
            'product'   => $product,
            'action'    => 'product/' . $productId . '/update',
        ]);
    }



 
    public function update()
    {
         
    }

    public function show()
    {
        
    }
}