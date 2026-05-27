<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'company',
        'position',
        'start_date',
        'end_date',
        'description',
        'type',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Scope to filter experiences of type work.
     */
    public function scopeWork($query)
    {
        return $query->where('type', 'work');
    }

    /**
     * Scope to filter experiences of type education.
     */
    public function scopeEducation($query)
    {
        return $query->where('type', 'education');
    }
}
