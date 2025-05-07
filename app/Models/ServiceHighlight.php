<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceHighlight extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    /**
     * Get the service category that owns the highlight.
     */
    public function serviceCategory(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class);
    }
    
    /**
     * Get the service that is highlighted.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
