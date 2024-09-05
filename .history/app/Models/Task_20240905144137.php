<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes trait

class Task extends Model
{
    use HasFactory, SoftDeletes; // Use SoftDeletes trait

    // Attributes that can be mass-assigned
    protected $fillable = [
        'title',
        'description',
        'completed',
    ];

    // Specify which attributes should be treated as dates
    protected $dates = ['deleted_at'];
}
