<?php

namespace App\Models;

use App\Events\ProductCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_location_description',
        'device_protocol',
        'device_IP_address',
        'device_IP_port',
        'device_RTU_address',
        'device_schema',
        'device_collector_name',
    ];

    protected $attributes = [
        'device_collector_status' => 'missing',
        'device_collector_name' => 'missing',
    ];

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
