<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Phone;
use App\Models\EmailAddress;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    
    public function phones(): HasMany {
        return $this->hasMany(Phone::class);
    }
    public function email_addresses(): HasMany {
        return $this->hasMany(EmailAddress::class);
    }
}
