<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the features for the service.
     */
    public function features(): HasMany
    {
        return $this->hasMany(ServiceFeature::class);
    }
}
