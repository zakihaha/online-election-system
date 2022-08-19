<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'number', 'vision', 'mission', 'votes', 'picture'
    ];

    public function picture()
    {
        return asset('storage/' . $this->picture);
    }

    public function candidateMembers()
    {
        return $this->hasMany(CandidateMember::class);
    }

    public function vote()
    {
        $this->increment('votes');
    }
}
