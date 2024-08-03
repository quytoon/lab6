<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function toggleActive(User $user)
    {
        $user->active = !$user->active;
        $user->save();

        return redirect()->back()->with('success', 'Đổi trạng thái thành công');
    }

}
