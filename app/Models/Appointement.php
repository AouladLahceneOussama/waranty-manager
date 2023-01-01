<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointement extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at',
        'date'
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
