<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Streak extends Model
{
    protected $fillable = ['user_id', 'level', 'item_name', 'image_path'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
