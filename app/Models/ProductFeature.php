<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductFeature extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    /**
     * Get the product that owns the feature.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
