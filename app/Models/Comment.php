<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_listing_id',
        'employer_id',
        'comment',
    ];

    public function jobListing()
    {
        return $this->belongsTo(JobListing::class);
    }

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }
}


