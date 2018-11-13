<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RapidController extends Controller
{
    public function getRapid()
    {
        return view('rapid');
    }
}
