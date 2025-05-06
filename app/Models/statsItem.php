<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatsItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the page that owns the stats item.
     */
    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
