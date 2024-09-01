<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
        protected $table = 'agent';

        protected $fillable = [
            'profile_pic',
            'first_and_second_name',
            'email',
            'phone_number',
            'county',
            'commission_rate',
            'successful_sales',
        ];
    
        protected $casts = [
            'commission_rate' => 'decimal:2',
            'successful_sales' => 'integer',
        ];
}
