<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthorizController extends Controller
{
    public function authoriz()
    {
//    Вариант 1 - выведет в случае не прохождения авторизации страницу с 403 ошибкой
//    Gate::authorize('view-protected-part');
//    return view('authoriz');

//    Вариант 2 - выведет в случае не прохождения авторизации наш текст
        if (Gate::check('view-protected-part', [self::class])) {
            return view('authoriz');
        }
        return 'У вас нет права доступа к этой странице!';
    }

    //Метод для работы авторизации только для показывания/скрытия отдельных кусков страницы, а не всей страницы
    public function authorizCan()
    {
        return view('authoriz');
    }

    public function authorizUser()
    {
//        dd(Auth::check());

        if (Gate::check('view-protected-user', [self::class])) {
            return view('authoriz');
        }
        return 'У вас нет права доступа к этой странице!';
    }

public function authorizeForAdmin()
    {
//        if (Gate::check('view-protected-admin', [self::class])) {
        if (Gate::check('viewProtectedAdmin', [self::class])) {
//        if (Gate::check('view-protected-part', [self::class])) {
            return view('authoriz');
        }
        return 'У вас нет права доступа к этой странице!';
    }
public function authorizeOnlyAdmin()
    {
        if (Gate::check('viewProtectedAdmin', [self::class])) {
//        if (Gate::check('view-protected-part', [self::class])) {
            return view('authorizOnlyAdmin');
        }
        return 'У вас нет права доступа к этой странице!';
    }

}
