<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $data = Food::latest()->get();
        return response()->json($data);
        //return array_reverse($data);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);

        $food = new Food([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
        ]);
        $food->save();
        return response()->json('Food added successfully');
    }


    public function show($id)
    {
        $food = Food::find($id);
        return response()->json($food);
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);

        $food = Food::find($id);
        $food->update($request->all());
        return response()->json('Food updated successfully');
    }

    public function destroy($id)
    {
       $food = Food::find($id);
       $food->delete();
       return response()->json('Food deleted successfully');
    }
}
