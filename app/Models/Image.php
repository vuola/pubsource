<?php

namespace App\Models;

use App\Events\ImageCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected  $fillable = [
        'image_platform',
        'image_protocol',
        'image_name',
        'image_deploy',
        'image_decomission',
        'product_id',
    ];

    protected $dispatchesEvents = [
        'created' => ImageCreated::class,
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
