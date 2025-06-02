<?php

namespace App\Models\Webiste;

use App\Models\Website\Ping;
use App\Models\Website\Website;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WebsitePingSetting extends Model
{
    
    /**
     * Get the website
     * @return HasOne Website
     */
    public function website(): HasOne 
    {
        return $this->hasOne(Website::class);
    }

    /** Get all pings for this setting
     * @return Ping
     */
    public function pings(): HasMany{
        return $this->hasMany(Ping::class);
    }


}
