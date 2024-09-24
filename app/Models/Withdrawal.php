<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'member_name',
        'balance_before',
        'withdraw_amount',
        'balance_after',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'member_id');
    }
}
