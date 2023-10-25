<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function index()
    {
        $user = User::with('role')->get();

        return view('backEnd.manageUser.index', compact('user'));
    }


    public function create()
    {
        $role = Role::get();

        return view('backEnd.manageUser.create', compact('role'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'role_id' => 'required',
            'email' => 'required|email|unique:users,email,id',
            'password' => 'required'
        ]);

        $validate['password'] = Hash::make($validate['password']);

        User::create($validate);
        return redirect('manage-user')->with('success', 'Berhasil Mengupdate user');
    }

    public function destroy(Request $request)
    {
        User::where('id', $request->idx)->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus user');
    }
}
