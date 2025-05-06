<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the stats items for the page.
     */
    public function statsItems(): HasMany
    {
        return $this->hasMany(StatsItem::class);
    }

    /**
     * Get the value items for the page.
     */
    public function valueItems(): HasMany
    {
        return $this->hasMany(ValueItem::class);
    }
}
