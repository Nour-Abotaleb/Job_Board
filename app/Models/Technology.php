<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Technology extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function jobListings()
    {
        return $this->belongsToMany(JobListing::class, 'job_listing_technology');
    }

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'candidate_technology');
    }
}
