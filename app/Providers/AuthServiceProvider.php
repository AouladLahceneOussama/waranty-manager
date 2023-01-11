<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

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

        // users gates
        Gate::define('view-users', function (User $user) {
            $allowedToView = ["*", "view_user", "create_user", "edit_user", "delete_user"];
            return in_array($user->permissions, $allowedToView);
        });

        Gate::define('manage-users', function (User $user, $user_id = null) {
            $allowedToManage = ["create_user", "edit_user", "delete_user"];
            return (str_contains($user->permissions, "*")) || ($user_id && $user->id == $user_id && in_array($user->permissions, $allowedToManage));
        });

        // folders gates
        Gate::define('view-folders', function (User $user) {
            $allowedToView = ["*", "view_folder", "create_folder", "edit_folder", "delete_folder"];
            return in_array($user->permissions, $allowedToView);
        });

        Gate::define('manage-folders', function (User $user, $folder_user_id = null) {
            $allowedToManage = ["*", "create_folder", "edit_folder", "delete_folder"];
            return (str_contains($user->permissions, "*")) || ($folder_user_id && $user->id == $folder_user_id && in_array($user->permissions, $allowedToManage));
        });
    }
}
