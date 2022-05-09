<?php

namespace App\Http\Controllers;

use App\Models\Figure;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        if(Auth::user()->is_admin()){
            return redirect('/')->withErrors('Admin cannot perform purchase transaction.');
        }
        if(!ctype_digit($request->id)){
            return redirect('/')->withErrors('Invalid figure.');
        }

        $figure = Figure::where('id', $request->id)->first();

        if(!$figure){
            return redirect('/')->withErrors('Invalid figure.');
        }
        return view('purchase')->withFigure($figure);
    }

    public function list()
    {
        $purchases = array();
        if(Auth::user()->is_admin()){
            $purchases = Purchase::all();
        }
        else if(Auth::user()->id){
            $purchases = Purchase::where('buyer_id', Auth::user()->id);
        }else{
            return redirect('/')->withErrors('you have not sufficient permissions');
        }

        return view('purchases')->withPurchases($purchases);
    }

    public function create(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'firstName' => 'required|max 60',
            'lastName' => 'required|max 60',
            'phone' => 'required|max 15',
            'address' => 'required|max 100',
            'postcode' => 'required|max 7',
            'city' => 'required|max 30',
            'state' => 'required|max 30', 
        ]);

        dd($validator);
    }
}
