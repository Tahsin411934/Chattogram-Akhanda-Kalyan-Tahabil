<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id', 'nominee_name', 'nominee_age', 'nominee_address', 'relation_with_member', 'get_percentage', 'nominee_image', 'nominee_signature'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'member_id');
    }
}
