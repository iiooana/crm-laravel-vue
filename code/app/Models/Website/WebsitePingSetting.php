<?php

namespace App\Models\Website;

use App\Models\Website\Ping;
use App\Models\Website\Website;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebsitePingSetting extends Model
{
    


    /**
     * Scope a query to include only active data
     */
    #[Scope]
    protected function scopeActive(Builder $query): void
    {
        $query->where('active',true)
               ->whereNotNull('every_minute')
               ->where('every_minute','<>',0);
    }

    //region RELATIONSHIPS  
    /**
     * Get the website
     * @return belongsTo Website
     */
    public function website(): belongsTo 
    {
        return $this->belongsTo(Website::class);
    }

    /** Get all pings for this setting
     * @return Ping
     */
    public function pings(): HasMany{
        return $this->hasMany(Ping::class);
    }
    //endregion RELATIONSHIPS  

}
