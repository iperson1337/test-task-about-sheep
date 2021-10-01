<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaddockResource;
use App\Models\Paddock;
use Illuminate\Http\Request;

class PaddockController extends Controller
{
    public function index()
    {
        $paddocks = Paddock::with('sheep')->get();
        return PaddockResource::collection($paddocks);
    }
}
