<?php
declare(strict_types=1);

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AuthorizControllerPolicy  //называть нужно так, чтобы автоматически связывало контроллер и политику и не нужно было прописывать связь между ними в классе "AuthServiceProvider"
{
    use HandlesAuthorization;

    //при написании механизма авторизации с использованием Policy (а не в файле "AppServiceProvider") мы не пишем "Gate::define()",
    // а название метода пишется такое-же как и название механизма в файле "AppServiceProvider" - 'view-protected-part', но используя CamelCase
    public function viewProtectedPart(User $user)
    {
        return $user->name === 'admin';

    }

    public function viewProtectedUser(User $user){
        $us = User::query()->findOrFail(Auth::user()->id);
        $role = $us->roles->toArray()[0]['role'];
        return $role == 'user';
    }

    public function viewProtectedAdmin(User $user): bool
    {
        $us = User::query()->findOrFail(Auth::user()->id);
        $role = $us->roles->toArray()[0]['role'];
        return $role == 'admin';
    }


}
