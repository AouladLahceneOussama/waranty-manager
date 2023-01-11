<?php

namespace App\Http\Livewire\User;

use App\Services\UsersService;
use Livewire\Component;

class Form extends Component
{
    public $rules = [
        "name" => "required|string|min:5|max:100",
        "email" => "required|email|unique:users,email",
        "role" => "required|string",
        "permissions" => "required|string"
    ];

    public $static_permissions = [
        "*" => "Tout",
        "view_user" => "Consulter Utilisateur",
        "create_user" => "Créé Utilisateur",
        "edit_user" => "Modifier Utilisateur",
        "delete_user" => "Supprimer Utilisateur",
        "view_folder" => "Consulter Dossier",
        "create_folder" => "Créé Dossier",
        "edit_folder" => "Modifier Dossier",
        "delete_folder" => "Supprimer Dossier",
    ];
    public $userId;
    public $action = "Ajouter";
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;
    public $permissions;

    public function mount()
    {
        if($this->action == "Modifier"){
            $user = UsersService::find($this->userId);
            $this->name = $user->name;
            $this->email = $user->email;
            $this->role = $user->role;
            $this->permissions = $user->permissions;
        }
    }

    public function render()
    {
        return view("user.form");
    }

    public function add()
    {
        $validate = array_merge($this->rules, ["password" => "required|confirmed|min:8"]);
        $this->validate($validate);

        UsersService::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
            "role" => $this->role,
            "permissions" => $this->permissions,
        ]);

        $this->emit('newResponse', [
            'error' => false,
            'redirect' => [
                'ok' => false,
                'url' => '',
                'msg' => ''
            ],
            'msg' => "Utilisateur bien ajouter",
            'data' => ""
        ]);
        sleep(2);
        return redirect('users');
    }

    public function edit()
    {
        $validate = $this->password ? array_merge($this->rules, ["password" => "required|confirmed|min:8", "email" => "required|email|unique:users,email,$this->userId"]) : array_merge($this->rules, ["email" => "required|email|unique:users,email,$this->userId"]);
        $this->validate($validate);

        UsersService::update([
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
            "role" => $this->role,
            "permissions" => $this->permissions,
        ], $this->userId);

        $this->emit('newResponse', [
            'error' => false,
            'redirect' => [
                'ok' => false,
                'url' => '',
                'msg' => ''
            ],
            'msg' => "Utilisateur bien Modifier",
            'data' => ""
        ]);
        sleep(2);
        return redirect('users');
    }
}
