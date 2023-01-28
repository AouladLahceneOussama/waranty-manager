<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Role;
use App\Models\User;
use App\Policies\FolderPolicy;
use App\Policies\UserPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // User::class => UserPolicy::class,
        // Folder::class => FolderPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view', function (User $user) {
            return $user->role_id == Role::VIEWER;
        });

        Gate::define('edit', function (User $user) {
            return $user->role_id == Role::EDITOR;
        });

        Gate::define('admin', function (User $user) {
            return $user->role_id == Role::ADMIN;
        });

    }
}
