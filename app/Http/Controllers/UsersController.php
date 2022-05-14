<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query();

        if(Request::input('search') !== null) {
            $users->where('name', 'like', '%' . Request::input('search') . '%');
        }

        $data =
            $users->paginate(10)
            ->withQueryString()
            ->through(fn($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'can' => [
                    'edit' => Auth::user()->can('edit', $user)
                ]
            ]);

        return Inertia::render('Users/Index', [
            'users' => $data,
            'filters' => Request::only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    }

    public function create()
    {
        return Inertia::render('Users/Create');
    }

    public function store()
    {
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email,id'],
            'password' => 'required',
        ]);

        User::create($attributes);

        return redirect('/users');
    }
}
