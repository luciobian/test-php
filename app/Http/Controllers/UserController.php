<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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

        $rules = [
            'name' => 'min:3',
            'email' => 'email|unique:users,email,' . $user->id,
        ];

        $this->validate($request, $rules);

        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('email')) {
            $user->email = $request->email;
        }


        if(!$user->isDirty())
        {
            return "error";
        }

        $user->save();

        return [$request, $user];
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

        return back();
    }
}
