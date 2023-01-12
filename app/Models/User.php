<?php

namespace App\Models;

use App\Models\Equipe;
use App\Models\Materiel;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function equipes(){
        return   $this->belongsTo(Equipe::class,'equipe_id');
      }
      /**
       * Get all of the materiels for the User
       *
       * @return \Illuminate\Database\Eloquent\Relations\HasMany
       */
      public function materiels()
      {
          return $this->hasMany(Materiel::class);
      }
}
