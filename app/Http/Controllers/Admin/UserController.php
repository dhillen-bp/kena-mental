<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $users = User::where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('email', 'LIKE', '%' . $keyword . '%')
            ->paginate(10);
        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
        ]);
        $request->merge(['password' => Hash::make($request->password)]);

        $user = User::create($request->all());
        return redirect('/admin/users')->with('success', "User Added Successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'  => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
        ]);
        $request->merge(['password' => Hash::make($request->password)]);

        $user = User::find($id);
        $userUpdate = $user->update($request->all());
        return redirect('/admin/users')->with('success', "User Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/users')->with('success', 'User Deleted Successfully!');
    }

    public function showDeletedUsers()
    {
        $deletedUsers = User::onlyTrashed()->paginate(10);
        return view('admin.user-deleted', compact('deletedUsers'));
    }

    public function restore($id)
    {
        $uset = User::onlyTrashed()->find($id);

        $uset->restore();

        return redirect('/admin/users')->with('success', 'User Restored Successfully!');
    }

    public function destroyPermanent($id)
    {
        $deletedUser = User::onlyTrashed()->find($id);

        $deletedUser->forceDelete();

        return redirect('/admin/deleted-testimonials')->with('success', 'User Deleted Permanent Successfully!');
    }
}
