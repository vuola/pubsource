<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Variable extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'variable_name',
        'variable_multiplier',
        'variable_unit',
    ];

    public function datas(): HasMany
    {
        return $this->hasMany(Data::class);
    }
}
