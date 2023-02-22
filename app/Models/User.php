<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'role'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

 //---------------------RELACIONES--------------------------
    //Relaciones con otras clases
    //Relaciones uno a uno
      public function rol()
      {
          return $this->hasOne(Rol::class);
      }

    //Relaciones uno a muchos
      public function posts()
      {
          return $this->hasMany(Post::class);
      }

      public function likes()
      {
          return $this->hasMany(Like::class);
      }

    //Relacion uno a muchos inversa
    
      public function communities()
      {
          return $this->belongsToMany(Community::class);
      }

    // --------------------------------------------------------------

}

