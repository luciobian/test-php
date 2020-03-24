<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

   /**
     * Show view of user
     *
     * @return void
     */
    public function show()
    {
        $users = User::orderBy('created_at')->paginate(10);
        return view('users.show', ['users'=>$users]);
    }

    /**
     * Show view of edit user
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user'=>$user]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate( [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users'
        ]);

        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('email')) {
            $user->email = $request->email;
        }


        if(!$user->isDirty())
        {
            return back()->with('error','Ha ocurrido un error.');
        }

        $user->save();

        return redirect('/users')->with('success','Modificación exitosa!');
    }

    /**
     * Elimina un usuario
     *
     * @param User $user
     * @return void
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success','Eliminación exitosa!');
    }
}
