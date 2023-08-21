<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showAdmin()
    {
        $users = User::paginate(10);
        return view('admin.users', compact('users'));
    }
}
