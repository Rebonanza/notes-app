<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable ;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Users extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;
    protected $table = 'users';

    protected $fillable = [
    	'name', 
        'email',
    	'password', 
    	'role_id'
    ];

    public function notes(){
        return $this->hasMany(Notes::class);
    }

    public function roles(){
        return $this->belongsTo(Roles::class);
    }
}

