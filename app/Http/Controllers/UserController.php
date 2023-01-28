<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController
{
    public function index()
    {
        if(!Gate::check('admin')) abort(403);
        return view("user.index");
    }

    public function create()
    {
        if(!Gate::check('admin')) abort(403);
        return view("user.create");
    }

    public function edit($userId)
    {
        $user = User::find($userId);
        if(!$user) abort(404);

        if(!Gate::check('admin')) abort(403);

        return view("user.edit", compact('userId'));
    }
}