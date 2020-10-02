<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;
#use App\Models\Acitivity;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity = Activity::orderBy('id', 'desc')
            ->paginate(20);

        return view('Logs.index', compact(['activity']));
    }
}
