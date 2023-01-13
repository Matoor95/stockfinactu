<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipe extends Model
{
    use HasFactory;
   /**
    * Get all of the comments for the Equipe
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    protected $fillable=['location'];
   public function users()
   {
       return $this->hasMany(User::class);
   }
}
