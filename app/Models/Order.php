<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'order_total',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}