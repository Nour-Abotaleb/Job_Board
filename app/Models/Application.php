<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'candidate_id',
        'job_listing_id',
        'cover_letter',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function jobListing()
    {
        return $this->belongsTo(JobListing::class);
    }
}
