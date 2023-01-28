<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // define static roles
    const ADMIN = 1;
    const VIEWER = 2;
    const EDITOR = 3;

    protected $fillable = [
        'name',
        'permissions',
        'description',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
