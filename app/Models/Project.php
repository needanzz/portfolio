<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title_id',
        'title_en',
        'description_id',
        'description_en',
        'category',
        'tech_stack',
        'thumbnail',
        'demo_url',
        'repo_url',
        'is_featured',
        'order',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['title', 'description'];

    /**
     * Get the title based on current application locale.
     */
    public function getTitleAttribute()
    {
        return app()->getLocale() === 'en' ? ($this->title_en ?: $this->title_id) : $this->title_id;
    }

    /**
     * Get the description based on current application locale.
     */
    public function getDescriptionAttribute()
    {
        return app()->getLocale() === 'en' ? ($this->description_en ?: $this->description_id) : $this->description_id;
    }

    /**
     * Scope to filter featured projects.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
