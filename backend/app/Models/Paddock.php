<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static observe(string $class)
 */
class Paddock extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];


    public function sheep(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Sheep::class, 'paddock_id', 'id');
    }
}
