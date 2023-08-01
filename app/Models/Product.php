<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_picture',
        'product_default_protocol',
        'product_default_IP_address',
        'product_default_IP_port',
        'product_default_RTU_address',
        'product_default_schema',
        'image_id',
    ];
}
