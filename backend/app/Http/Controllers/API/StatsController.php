<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Paddock;
use App\Models\Sheep;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index()
    {
        $stats['all_sheep_count'] = Sheep::withTrashed()->count();
        $stats['killed_sheep_count'] = Sheep::onlyTrashed()->count();
        $stats['live_sheep_count'] = Sheep::count();
        $stats['most_populated_paddock'] = Paddock::withCount('sheep')->orderBy('sheep_count', 'desc')->first();
        $stats['least_populated_paddock'] = Paddock::withCount('sheep')->orderBy('sheep_count', 'asc')->first();

        return response()->json(compact('stats'));
    }
}
