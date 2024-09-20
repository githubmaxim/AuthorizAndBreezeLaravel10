<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'role',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function users(): BelongsToMany{
        return $this->belongsToMany(
            User::class,
            'role_user',
            'role_id',
            'user_id');
    }
}
