<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
    	'name', 
        'email',
    	'password', 
    	'role'
    ];

    public function notes(){
        return $this->hasMany(Notes::class);
    }

    public function roles(){
        return $this->belongsTo(Roles::class);
    }
}

