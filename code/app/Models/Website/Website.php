<?php

namespace App\Models\Website;

use App\Models\Webiste\WebsitePingSetting;
use App\Models\Website\Ping;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Website extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'domain'
    ];

     /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:H:i d/m/Y',
            'updated_at' => 'datetime:H:i d/m/Y'
        ];
    }

    /**
     * Get the Ping setttings
     * @return HasMany WebsitePingSetting
     */
    public function ping_settings(): HasMany
    {
        return $this->hasMany(WebsitePingSetting::class);
    }

    /**
     * Get pings
     */
    public function pings(): HasManyThrough
    {
        return $this->hasManyThrough(WebsitePingSetting::class,Ping::class);
    }
    
}
