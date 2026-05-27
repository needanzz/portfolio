<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreelancePrice extends Model
{
    protected $fillable = [
        'service_name_id',
        'service_name_en',
        'description_id',
        'description_en',
        'features_id',
        'features_en',
        'price_start',
        'is_active',
        'order',
    ];

    protected $casts = [
        'features_id' => 'array',
        'features_en' => 'array',
        'price_start' => 'integer',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Appended attributes for JSON serialization and dynamic rendering.
     */
    protected $appends = ['service_name', 'description', 'features'];

    /**
     * Get the service name based on the current app locale.
     */
    public function getServiceNameAttribute()
    {
        return app()->getLocale() === 'en' 
            ? ($this->service_name_en ?: $this->service_name_id) 
            : $this->service_name_id;
    }

    /**
     * Get the description based on the current app locale.
     */
    public function getDescriptionAttribute()
    {
        return app()->getLocale() === 'en' 
            ? ($this->description_en ?: $this->description_id) 
            : $this->description_id;
    }

    /**
     * Get features list based on the current app locale.
     */
    public function getFeaturesAttribute()
    {
        return app()->getLocale() === 'en' 
            ? ($this->features_en ?: $this->features_id) 
            : $this->features_id;
    }

    /**
     * Scope a query to only include active freelance prices.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
