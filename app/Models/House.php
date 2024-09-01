<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $table = 'house';

    protected $fillable = [
        'photoPaths',
        'homeType',
        'noFloors',
        'noBedrooms',
        'noFullBathrooms',
        'maxHouseWidth',
        'maxHouseLength',
        'landSize',
        'yearBuilt',
        'furnishedStatus',
        'garageType',
        'sellType',
        'price',
        'email',
        'phoneNumber',
        'county',
        'coordinates',
    ];

    protected $casts = [
        'photoPaths' => 'array', 
    ];
}