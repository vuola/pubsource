<?php

namespace App\Models;

use App\Events\SiteCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_longitude',
        'site_latitude',
    ];

    protected $dispatchesEvents = [
        'created' => SiteCreated::class,
     ];
         

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
