<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    // Satu Role memiliki banyak Users
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
