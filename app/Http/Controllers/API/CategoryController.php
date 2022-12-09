<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = CategoryResource::collection(Category::all());
        return response()->json($categories);
    }

    public function store(StoreCategoryRequest $request)
    {
        $categories = Category::create($request->validated());
        return response()->json([
            'status'=> 'success',
            'data'=> $categories], 200);
    }


    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category'=>'required',
        ]);
        $data = Category::find($id);
        $data->category = $request->category;
        $data->update();
        return response()->json([
            'status'=>'success'
        ], 200);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json('successfully deleted');
    }
}
