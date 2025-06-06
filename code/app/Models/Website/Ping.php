<?php

namespace App\Models\Website;

use App\Models\Webiste\WebsitePingSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Ping extends Model
{
    public $timestamps = false;
    protected $fillable = [
        "website_ping_setting_id",
        "status_code",
        "headers",
        "body"
    ];
    /**
     * Get the WebsitePingSetting
     * @return WebsitePingSetting
     */
    public function website_ping_setting(): BelongsTo
    {
        return $this->belongsTo(WebsitePingSetting::class);
    }

    /**
     * Get the website
     * @return Website
    */
    public function website(): HasOneThrough
    {
        return $this->hasOneThrough(WebsitePingSetting::class,Website::class);
    }
}
