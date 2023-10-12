<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;
    protected $table = 'notes';

    protected $fillable = [
    	'title',
        'description',
        'user_id',
        'image',
    ];

    public function user(){
        return $this->belongsTo(Users::class);
    }
}
