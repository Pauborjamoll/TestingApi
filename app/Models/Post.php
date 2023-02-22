<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //RELACIONES

    //Uno a uno
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    //Uno a muchos
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
