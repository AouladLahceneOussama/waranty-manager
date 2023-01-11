<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController
{
    public function index()
    {
        if(!Gate::authorize('view-users')) abort(403);
        return view("user.index");
    }

    public function create()
    {
        if(!Gate::authorize('manage-users')) abort(403);
        return view("user.create");
    }

    public function edit($userId)
    {
        $user = User::find($userId);
        if(!$user) abort(404);

        if(!Gate::authorize('manage-users', $userId)) abort(403);

        return view("user.edit", compact('userId'));
    }
}