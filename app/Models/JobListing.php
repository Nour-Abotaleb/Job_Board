<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory;
    protected $fillable = [
        'employer_id',
        'title',
        'description',
        'location',
        'work_type',
        'application_deadline',
        'salary_range_min',
        'salary_range_max',
        'status',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'job_listing_technology');
    }
}
