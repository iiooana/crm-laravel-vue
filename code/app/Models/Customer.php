<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Phone;
use App\Models\EmailAddress;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\Gender;

class Customer extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'first_name',
        'last_name',
        'gender'
    ];

    protected function casts(): array{
        return  [
            'gender' => Gender::class
        ];
    }

    /**
     * Region Relationships
     */
    public function phones(): HasMany {
        return $this->hasMany(Phone::class);
    }
    public function email_addresses(): HasMany {
        return $this->hasMany(EmailAddress::class);
    }
   //endregion
}
