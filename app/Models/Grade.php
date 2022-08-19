<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'year', 'major', 'subclass', 'total'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
