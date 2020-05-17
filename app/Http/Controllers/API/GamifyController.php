<?php

namespace App\Http\Controllers\API;

use Ansezz\Gamify\Badge;
use Ansezz\Gamify\Point;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GamifyController extends Controller
{


    public function badges($id = null)
    {
        return response()->json(Badge::with(['group', 'level'])->get());
    }

    public function points($id = null)
    {
        return response()->json(Point::with(['group'])->get());
    }

    /**
     * @param \Ansezz\Gamify\Point $point
     *
     * @return boolean
     */
    public function achievePoint(Point $point)
    {
        return auth()->user()->achievePoint($point);
    }

    /**
     * @param \Ansezz\Gamify\Point $point
     *
     * @return boolean
     */
    public function undoPoint(Point $point)
    {
        return auth()->user()->undoPoint($point);
    }
}
