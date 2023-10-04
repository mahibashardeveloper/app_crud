<?php

namespace App\Http\Controllers\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryService
{

    public static function list($request)
    {

        try {
            $limit = $request->limit ?? 10;
            $keyword = $request->q ?? '';
            $results = Category::orderBy('id', 'desc');
            if (isset($keyword) && !empty($keyword)) {
                $results->where(function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', '%' . $keyword . '%');
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
                    'name' => 'required|unique:categories,name',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $category = new Category();
            $category-> name = $request->name;
            $category-> save();
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
            $category = Category::where('id', $request->id)->first();
            if($category == null){
                return ['status' => 500, 'errors' => 'data not found'];
            }
            return ['status' => 200, 'data' => $category];
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
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $category = Category::where('id', $request->id)->first();
            if($category == null){
                return ['status' => 500, 'errors' => 'data not found'];
            }
            $category->name = $request->name;
            $category->save();
            return ['status' => 200, 'msg' => 'data has been updated successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }

    }

    public static function delete($request)
    {

        try {
            Category::whereIn('id', $request->ids)->delete();
            return ['status' => 200, 'msg' => 'data has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }

    }

}
