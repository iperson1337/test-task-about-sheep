<?php

namespace App\Models;

use App\Filters\HistoryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'day'
    ];

    /* ************************ Relations ************************* */

    public function sheep(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Sheep::class, 'history_sheep', 'history_id', 'sheep_id')->withPivot('paddock_id');
    }

    /* ************************ Scopes ************************* */

    /**
     * @param $query
     * @param $request
     * @return mixed
     */
    public function scopeFilter($query, $request)
    {
        return (new HistoryFilter($request))->apply($query);
    }

}
