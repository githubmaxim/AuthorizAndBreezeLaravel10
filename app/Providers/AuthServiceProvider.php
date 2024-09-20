<?php

namespace App\Providers;

 use App\Http\Controllers\AuthorizController;
 use App\Http\Controllers\ForCheckMyCodeController;
 use App\Models\User;
 use App\Policies\AuthorizControllerPolicy;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
//        ForCheckMyCodeController::class => AuthorizControllerPolicy::class
        AuthorizController::class => AuthorizControllerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //Механизм написания авторизации не через Политики, а просто через фасад Gate
//        Gate::define('view-protected-part', function (User $user) {
//            return $user->name === 'Name';

//            $us = User::query()->findOrFail(Auth::user()->id);
//            $role = $us->roles->toArray()[0]['role'];
//            return $role == 'admin';
//        });
    }
}
