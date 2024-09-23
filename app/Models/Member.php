<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $primaryKey = 'member_id'; // Set primary key to member_id
    public $incrementing = false; // Set to false as member_id is not auto-incrementing
    protected $keyType = 'string';
    protected $fillable = [
        'member_id', 
        'member_name', 
        'father_name', 
        'mother_name', 
        'spouse_name', 
        'permanent_address', 
        'present_address', 
        'mobile_number', 
        'email', 
        'date_of_birth', 
        'national_id_number', 
        'occupation', 
        'educational_qualification', 
        'akhanda_kalyan_tahabil', 
        'akhanda_mondoli_address', 
        'membership_id', 
        'image', 
        'signature',
        'balance',
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

    // You can add more accessors for the newly added fields if needed
}
