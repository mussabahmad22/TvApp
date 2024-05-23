<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_vedio',
        'device_logo',
        'guest_name',
        'tv_name',
        'count',
        'device_code',
        'guest_message',
        'lat',
        'longitude',
        'temprature',
        'user_id',
    ];

}
