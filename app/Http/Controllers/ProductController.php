<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Services\ProductService;

class ProductController extends BaseController
{

    public function create(Request $request){
        $rv = ProductService::create($request);
        return response()->json($rv, 200);
    }

    public function list(Request $request){
        $rv = ProductService::list($request);
        return response()->json($rv, 200);
    }

    public function single(Request $request){
        $rv = ProductService::single($request);
        return response()->json($rv, 200);
    }

    public function update(Request $request){
        $rv = ProductService::update($request);
        return response()->json($rv, 200);
    }

    public function delete(Request $request){
        $rv = ProductService::delete($request);
        return response()->json($rv, 200);
    }

}
