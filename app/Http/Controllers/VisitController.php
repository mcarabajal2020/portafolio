<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function recordVisit($page)
{
    $visit = new Visit;
    $visit->page = $page;
    $visit->ip = request()->ip();
    $visit->save();
}
}
