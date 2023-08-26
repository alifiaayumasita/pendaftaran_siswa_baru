<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students'; // Make sure this matches the table name

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'current_address',
        'city',
        'province',
        'phone',
        'mobile',
        'email',
        'nationality',
        'birthday',
        'birth_place',
        'birth_city',
        'birth_province',
        'gender',
        'status',
        'religion',
        'image'
    ];

    // Define the relationships with related data (assuming you have set up the necessary relationships)
    // public function city()
    // {
    //     return $this->belongsTo(City::class, 'city');
    // }

    // public function province()
    // {
    //     return $this->belongsTo(Province::class, 'province');
    // }

    // public function birthCity()
    // {
    //     return $this->belongsTo(City::class, 'birth_city');
    // }

    // public function birthProvince()
    // {
    //     return $this->belongsTo(Province::class, 'birth_province');
    // }

    // Define relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

