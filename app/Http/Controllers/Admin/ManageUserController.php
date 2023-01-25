<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ManageUserController extends Controller
{
    public function index()
    {
        $user = User::where('role', 0)->paginate();
        $current_css="Manage User";
        return view('AdminDashboard.Pages.manage_user', ['user' => $user])->with('current_css',$current_css);
    }

    public function edit(User $id)
    {
        return view('AdminDashboard.Pages.edit', ['id' => $id]);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)]
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();
        return redirect('/admin');
    }

    public function destroy(User $id)
    {
        $id->delete();
        return redirect('/admin')->with('message', 'User has been deleted!');
    }

}
