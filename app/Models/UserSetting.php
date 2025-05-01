<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'home_address',
        'business_address',
        'shopping_center',
        'brand_name',
        'brand_logo',
        'brand_bg_color',
    ];
}