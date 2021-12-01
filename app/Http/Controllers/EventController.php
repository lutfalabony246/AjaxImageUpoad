<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Calendar;

class EventController extends Controller
{
    //
    public function index(Request $request)
    {
    
            if($request->ajax())
            {
                $data = Event::whereDate('start', '>=', $request->start)
                           ->whereDate('end',   '<=', $request->end)
                           ->get(['id', 'title', 'start', 'end']);
                return response()->json($data);
            }
            return view('full-calender');
        }

}
