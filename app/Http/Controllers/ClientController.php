<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();
        return view('clients.index',  compact('clients'));
    }

    public function create(){
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|unique:clients',
           'image'=> 'required'
        ]);

        if($request->hasFile('image')){
            $filenamewithExt = $request->file('image')->getClientOriginalName();
            $image = $request->file('image')->storeAs('public/clients', $filenamewithExt);

            Client::create([
               'name'=> $request->name,
                'image' => 'clients/'.$filenamewithExt
            ]);

            return redirect()->route('clients.index')->with('success', 'Client added successfully');

        }
    }

    public function edit($id){
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id){
        $client = Client::find($id);
        $old_image = $client->image;
        if($request->hasFile('image')){
            Storage::delete($old_image);
            $filenamewithExt = $request->file('image')->getClientOriginalName();
            $image = $request->file('image')->storeAs('public/clients', $filenamewithExt);

            $client->name = $request->name;
            $client->image = 'clients/'.$filenamewithExt;
            $client->update();

            return redirect()->route('clients.index')->with('success', 'Client has been updated with a new image');
        }

        $client->name = $request->name;
        $client->update();
        return redirect()->route('clients.index')->with('success', 'Client has been updated');
    }

    public function destroy($id){
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client successfully deleted');
    }


}
