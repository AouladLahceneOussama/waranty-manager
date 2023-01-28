<?php

namespace App\Services;

use App\Models\Folder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersService
{
    public static function get(array $options)
    {
        Carbon::setLocale('fr');
        $users = User::orderBy($options["orderBy"], $options["orderDirection"])->paginate($options["limit"]);
        return $users;
    }

    public static function find(int $user_id)
    {
        return User::find($user_id);
    }

    public static function create(array $data)
    {
        $user = new User();
        $user->created_by = Auth::id();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']); 
        $user->role_id = $data['role_id'];
        $user->save();

        return $user;
    }

    public static function update(array $data, int $user_id)
    {
        $user = User::find($user_id);
        if(!$user_id) return false;

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = isset($data['password']) ? Hash::make($data['password']) : $user->password; 
        $user->role_id = $data['role_id'];
        $user->save();
    }

    public static function delete(int $user_id)
    {
        $user = User::find($user_id);
        if(!$user_id) return false;

        // Delete all folders created by the user
        $folders = Folder::where('user_id', $user_id)->get();
        foreach($folders as $folder){
            FoldersService::delete($folder->id);
        }

        // Delete the user
        $user->delete();
        return true;
    }

    public static function simpleSearch(string $query, array $options)
    {
        $users = User::where("name", 'like', "%$query%")
        ->orWhere("email", "like", "%$query%")
        ->orWhere("role", "like", "%$query%")
        ->orderBy($options["orderBy"], $options["orderDirection"])
        ->paginate($options["limit"]);

        return $users;
    }
}
