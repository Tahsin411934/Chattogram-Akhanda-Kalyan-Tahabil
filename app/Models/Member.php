<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id', 'member_name', 'father_name', 'mother_name', 'spouse_name', 'permanent_address', 'present_address', 'image', 'signature'
    ];

    // Accessor to get the image URL
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    // Accessor to get the signature URL
    public function getSignatureUrlAttribute()
    {
        return $this->signature ? asset('storage/' . $this->signature) : null;
    }
}
