<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function today()
    {
        $today = History::latest()->first();
        return response()->json(compact('today'));
    }
}
