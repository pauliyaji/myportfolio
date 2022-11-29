<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        $request->validate([
           'title'=>'required',
           'description'=>'required',
           'price'=>'required',
           'category_id'=>'required',
        ]);

        $food = Food::create([
           'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category_id,
        ]);

        return response()->json([
            'success'=>true,
            'message'=>'Food created',
            'data'=>$food
        ], 201);
    }

    public function show(Food $food)
    {
        $food = new FoodResource($food);
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

    public function update(Request $request, Food $food)
    {
        $request->validate([
           'title'=>'required',
           'description'=>'required',
           'price'=>'required',
           'category_id'=>'required'
        ]);
        $food = Food::find($food);
        if($food){
            $food->update([
                'title'=> $request->title,
                'description'=>$request->description,
                'price'=>$request->price,
                'category_id'=> $request->category_id,
            ]);
            return response()->json([
                'success'=>true,
                'message'=>'Food updated successfully',
                'data'=>$food
            ], 200);
        }
        return response()->json([
            'success'=>false,
            'message'=>'Food not found'
        ], 404);
    }

    public function destroy(Food $food)
    {
        //$food->delete();
        //return response()->json(null, 204);
        if($food){
            $food->delete();

            return response()->json([
               'success'=>true,
               'message'=>'Food deleted successfully'
            ], 200);
        }
        return response()->json([
           'success'=>false,
           'message'=>'Food not found'
        ], 404);
    }
}
