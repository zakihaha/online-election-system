<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if (request()->has('username')) {
            $users = User::where('username', 'like', '%' . request('username') . '%')->whereNotNull('grade_id')->with('grade')->paginate(10);
            $users->appends(['username' => request('username')]);
        } else {
            $users = User::whereNotNull('grade_id')->with('grade')->paginate(10);
        }

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('users.create', compact('grades'));
    }

    public function store()
    {
        $this->validate(request(), [
            'username' => 'required|min:3|unique:users,username',
            'password' => 'required|min:6',
            'grade_id' => 'required|exists:grades,id',
        ]);

        User::create([
            'username' => request('username') . \Str::upper(\Str::random(2)),
            'password' => bcrypt(request('password')),
            'grade_id' => request('grade_id'),
        ]);

        return redirect('/users');
    }

    public function edit(User $user)
    {
        $grades = Grade::all();
        return view('users.edit', compact('user', 'grades'));
    }

    public function update(User $user)
    {
        $this->validate(request(), [
            'username' => 'required|min:3|unique:users,username,' . $user->id,
            'password' => 'nullable|min:6',
            'grade_id' => 'required|exists:grades,id',
        ]);

        $user->update([
            'username' => request('username'),
            'password' => request('password') ? bcrypt(request('password')) : $user->password,
            'grade_id' => request('grade_id'),
        ]);

        return redirect('/users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
