<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    public $fillable = ['user_id', 'description', 'title','image','created_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
