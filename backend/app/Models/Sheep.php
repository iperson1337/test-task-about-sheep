<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sheep extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'paddock_id',
    ];

    public function paddock(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Paddock::class, 'paddock_id', 'id');
    }
}
