<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Customer;

class EmailAddress extends Model
{
    public function customer(): BelongsTo {
        return $this->belongsTo(Customer::class);
    }
}
