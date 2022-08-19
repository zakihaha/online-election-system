<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id', 'grade_id', 'name',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
