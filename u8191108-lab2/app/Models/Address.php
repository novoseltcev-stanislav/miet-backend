<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function buyer() : BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
