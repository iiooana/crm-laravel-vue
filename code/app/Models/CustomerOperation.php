<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Customer;
use App\Models\User;
use App\Models\TypeOperation;

class CustomerOperation extends Model
{
    public function customer(): BelongsTo {
        return $this->belongsTo(Customer::class);
    }
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function type_operation(): BelongsTo {
        return $this->belongsTo(TypeOperation::class);
    }
}
