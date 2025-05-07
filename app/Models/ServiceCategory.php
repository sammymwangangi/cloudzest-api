<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the service highlights for the category.
     */
    public function serviceHighlights(): HasMany
    {
        return $this->hasMany(ServiceHighlight::class);
    }
}
