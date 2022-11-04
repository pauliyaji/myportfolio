<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasPermissionTo('user-list')){
            $users = User::latest()->get();
            return view('users.index', compact('users'));
        }else{
            return redirect()->back()->with('success', 'Sorry you do not have the permission');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->hasPermissionTo('user-create')){
            return view('users.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        return redirect()->route('users.index')->with('success', 'Record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user'=>$user,
            'userRole'=> $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        if(is_null($request->password)){
            $data = User::find($user)->first();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->save();
        }else{
            $data = User::find($user)->first();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->save();
        }
        $user->syncRoles($request->get('role'));

        return redirect()->route('users.index')
            ->with('success', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $user->delete($user);
        return redirect()->route('users.index')
            ->with('success', 'Record deleted successfully');
    }
}
