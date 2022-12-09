<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Resources\FoodResource;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        //return FoodResource::collection(Food::all());
        //return FoodResource::collection(Food::with('category')->get());
        $food = FoodResource::collection(Food::with('category')->get());
        return response()->json([
           'success'=>true,
           'message'=>'List all of food',
           'data'=>$food,
        ], 200);
    }

    public function store(StoreFoodRequest $request)
    {
        $foods = Food::create($request->validated());
        return response()->json([
            'status'=> 'success',
            'data'=> $foods], 200);
    }

    public function show($id)
    {
        //$food = new FoodResource($food);
        $food = Food::find($id);
        if($food){
            return response()->json([
                'success'=> true,
                'message' => 'Detail Food data',
                'data' => $food,
            ]);
        }
        return response()->json([
            'success'=>false,
            'message'=>'Food not found'
        ], 404);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
           'title'=>'required',
           'description'=>'required',
           'price'=>'required',
           'category_id'=>'required'
        ]);
        $food = Food::find($id);

            $food->update([
                'title'=> $request->title,
                'description'=>$request->description,
                'price'=>$request->price,
                'category_id'=> $request->category_id,
            ]);
            return response()->json([
                'success'=>true,
                'message'=>'Food updated successfully',
            ], 200);

    }

    public function destroy($id)
    {
       $food = Food::find($id);
       $food->delete();
            return response()->json([
               'success'=>true,
               'message'=>'Food deleted successfully'
            ], 200);

    }
}
