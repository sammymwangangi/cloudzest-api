<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceFeature extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the service that owns the feature.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
