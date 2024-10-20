<?php
declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyCommand extends Command
{
    protected $signature = 'my:command';

    protected $description = 'Command description';

    public function handle(User $user)
    {
        $data2 = DB::select('select u.id, u.name, r.role from users as u inner join role_user as ru on ru.user_id = u.id inner join roles as r on r.id = ru.role_id');
        dump($data2);
    }
}
