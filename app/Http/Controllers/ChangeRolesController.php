<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class ChangeRolesController extends Controller
{
    public function show()
    {
//        1. Через Eloquent
//        $us = User::all();
//        $data = array();
//        foreach ($us as $user) {
//            $id = $user->id;
//            $data['id' . ($user->id)] = ['name'=>$user->name,'id'=>$user->id, 'role'=>$user->roles->toArray()[0]['role']];
//        }

//        2. Через SQL-запрос
        $data = DB::select('select u.id, u.name, r.role from users as u inner join role_user as ru on ru.user_id = u.id inner join roles as r on r.id = ru.role_id');
        return view('changeRoles', compact('data'));
    }
}
