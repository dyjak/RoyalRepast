<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');
        $usersQuery = User::query();
        if ($search) {
            $usersQuery->where('name', 'like', "%$search%")
                ->orWhere('surname', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        }
        $users = $usersQuery->get();

        return view('admin.users.table-users', compact('users'));
    }


    public function userUpdate($id)
    {
        $user = User::find($id);
        return view('admin.users.user-edit', compact('user'));
    }

    public function userDestroy($id)
    {
        $user = User::find($id);
        return view('admin.users.user-delete', compact('user'));
    }

    public function userCreate()
    {
        return view('admin.users.user-create');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->orders()->exists()) {
            return redirect()->route('admin.users')->with('error', 'Couldn\'t remove this user, because there are refferal records.');
        }
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User has been successfully removed.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'permission' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'permission' => $request->permission,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'street' => $request->street,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('admin.users')->with('success', 'User added successfully.');
    }
}
