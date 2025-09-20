<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['make', 'model', 'year', 'color', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
