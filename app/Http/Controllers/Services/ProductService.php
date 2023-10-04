<?php

namespace App\Http\Controllers\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductService
{

    public static function list($request)
    {
        try {
            $limit = $request->limit ?? 10;
            $keyword = $request->q ?? '';
            $results = Product::with('category_info')->orderBy('id', 'desc');
            if (isset($keyword) && !empty($keyword)) {
                $results->where(function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', '%' . $keyword . '%');
                    $q->orWhere('price', 'LIKE', '%' . $keyword . '%');
                    $q->orWhere('quantity', 'LIKE', '%' . $keyword . '%');
                    $q->orWhere('description', 'LIKE', '%' . $keyword . '%');
                    $q->orWhereHas('category_info', function ($q) use ($keyword) {
                        $q->where('name', 'LIKE', '%' . $keyword . '%');
                    });
                });
            }
            $paginatedData = $results->paginate($limit);
            return ['status' => 200, 'data' => $paginatedData];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function create($request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|unique:products,name',
                    'price' => 'required|unique:products,price',
                    'quantity' => 'required|integer',
                    'description' => 'required'
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $product = new Product();
            $product-> name = $request->name;
            $product-> price = $request->price;
            $product-> quantity = $request->quantity;
            $product-> description = $request->description;
            $product-> category_id = $request->category_id;
            $product-> save();
            return ['status' => 200, 'msg' => 'data has been saved successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function single($request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'id' => 'required',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $product = Product::where('id', $request->id)->first();
            if($product == null){
                return ['status' => 500, 'errors' => 'data not found'];
            }
            return ['status' => 200, 'data' => $product];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function update($request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'price' => 'required',
                    'quantity' => 'required|integer',
                    'description' => 'required',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $product = Product::where('id', $request->id)->first();
            if($product == null){
                return ['status' => 500, 'errors' => 'data not found'];
            }
            $product->name = $request->name;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->description = $request->description;
            $product-> category_id = $request->category_id;
            $product->save();
            return ['status' => 200, 'msg' => 'data has been updated successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function delete($request)
    {
        try {
            Product::whereIn('id', $request->ids)->delete();
            return ['status' => 200, 'msg' => 'data has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }
}
