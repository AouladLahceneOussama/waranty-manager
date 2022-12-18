<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    public function insureds()
    {
        return $this->hasMany(Insured::class);
    }

    public function medias()
    {
        return $this->hasMany(Media::class);
    }

    public function appointements()
    {
        return $this->hasMany(Appointement::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
