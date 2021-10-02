<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{

    public function index()
    {
        $histories = History::get();
        return response()->json(compact('histories'));
    }

    public function lastDay()
    {
        $last_day = History::latest()->first();
        return response()->json(compact('last_day'));
    }

    public function stats(Request $request)
    {
        $history = History::filter($request)->with('sheep')->latest()->first();
        $stats['all_sheep_count'] = $history->sheep()->withTrashed()->count();
        $stats['killed_sheep_count'] = $history->sheep()->onlyTrashed()->count();
        $stats['live_sheep_count'] = $history->sheep()->count();
        $stats['most_populated_paddock'] = $history->sheep->groupBy('paddock_id')->sortByDesc(fn($paddock) => count($paddock))->keys()->first() ?? 0;
        $stats['least_populated_paddock'] = $history->sheep->groupBy('paddock_id')->sortBy(fn($paddock) => count($paddock))->keys()->first() ?? 0;

        return response()->json(compact('stats'));
    }
}
