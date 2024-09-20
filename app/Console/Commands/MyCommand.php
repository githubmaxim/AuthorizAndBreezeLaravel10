<?php
declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class MyCommand extends Command
{
    protected $signature = 'my:command';

    protected $description = 'Command description';

    public function handle(User $user)
    {
//        dd($user);
//dd(Auth::attempt(['email' => $user->email, 'password' => $user->password]));
        dd(\Auth::check());
//        dd(Auth::user());
//        $user = User::query()->findOrFail(Auth::user()->id);
//        $role = $user->roles->toArray()[0]['role'];
//        dd($role);
//        dd('hi');
    }
}
