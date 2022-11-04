<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $data = Food::latest()->get();
        return view('food.index', compact('data'));
    }


    public function create()
    {
        return view('food.create');
    }


    public function store(Request $request)
    {
        $validator = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);

        Food::create($request->all());
        return redirect()->route('food.index')
            ->with('success', 'Record added successfully');
    }


    public function show(Food $food)
    {
        return view('food.show', ['food'=>$food]);
    }


    public function edit(Food $food)
    {
        return view('food.edit', ['food'=>$food]);
    }


    public function update(Request $request, Food $food)
    {
        $validator = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);

        $food->update($request->all());
        return redirect()->route('food.index')
            ->with('success', 'Record  successfully updated');
    }


    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->route('food.index')
            ->with('success', 'Record deleted successfully');
    }
}
