<?php

namespace App\Http\Controllers;

use App\Models\Figure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FigureController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function retrieve(Request $request) {
        if(!ctype_digit($request->id)){
            return redirect('/')->withErrors('Invalid figure.');
        }
    }

    // can add more function for update/remove figure..
}
