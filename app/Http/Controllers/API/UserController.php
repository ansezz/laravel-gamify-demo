<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return response()->json(auth()->user());
    }

    public function badges()
    {
        return response()->json(auth()->user()->badges()->with(['group', 'level'])->get());
    }

    public function points($id = null)
    {
        return response()->json(auth()->user()->points()->with(['group'])->get());
    }
}
