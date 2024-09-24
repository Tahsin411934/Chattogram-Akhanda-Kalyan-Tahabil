<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id',
        'deposit_amount',
        'current_balance',
        'image',
    ];
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'member_id');
    }
}
