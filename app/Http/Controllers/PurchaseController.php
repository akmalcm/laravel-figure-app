<?php

namespace App\Http\Controllers;

use App\Models\Figure;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    // Retrieve single data from db
    public function retrieve(Request $req) {
        // validating id is decimal digit
        if (!ctype_digit($req->id)) {
            return redirect('/')->withErrors('Invalid purchase.');
        }

        // check if current path is purchasing the figure
        if (str_contains($req->path(), "form")) {

            // admin cannot perform purchase
            if ($req->user()->is_admin()) {
                return redirect('/')->withErrors('Admin cannot perform purchase transaction.');
            }

            // creating purchase model
            $purchase = new Purchase;
            $purchase->figure = Figure::where('id', $req->id)->first();

            if (!$purchase->figure) {
                return redirect('/')->withErrors('Invalid figure.');
            }
        }

        // current path is viewing/editing existing purchase transaction in database
        else {
            $purchase = Purchase::where('id', $req->id)->with('buyer')->with('figure')->first();
            if (!$purchase) {
                return redirect('/')->withErrors('Invalid purchase.');
            }
        }

        // get mode based on path
        $readonly = str_contains($req->path(), "purchase/view") ? true : false;

        // if mode edit and status is completed, redirect back with error
        if (!$readonly && $purchase->status == 'completed') {
            return back()->withErrors('Purchase is completed cannot be edit.');
        }
        return view('purchase')->withPurchase($purchase)->with('readonly', $readonly);
    }

    // Retrieve collection of data from db
    public function list(Request $req) {

        $purchases = array();
        if ($req->user()->is_admin()) {
            $purchases = Purchase::all();
        } else if ($req->user()->id) {
            // select purchases related to the user only
            $purchases = Purchase::where('buyer_id',$req->user()->id)->with('buyer')->with('figure')->get();
        } else {
            return redirect('/')->withErrors('you have not sufficient permissions');
        }

        return view('purchases')->withPurchases($purchases);
    }

    // Storing data into db
    public function create(Request $req) {

        // validating request parameter
        $req->validate([
            'firstName' => 'required|max:60',
            'lastName' => 'required|max:60',
            'phone' => 'required|max:15|regex:/^01[0-9]{1}[0-9]{7,8}$/',
            'address' => 'required|max:100',
            'postcode' => 'required|max:7',
            'city' => 'required|max:30',
            'state' => 'required|max:30',
        ]);

        $purchase = new Purchase();
        $purchase->fill($req->all());

        $purchase->buyer_id = $req->user()->id;
        $purchase->save();

        return redirect('/')->withMessage('Purchase transaction has completed.');
    }

    // updating existing data in db
    public function update(Request $req) {

        // validating request parameter
        $req->validate([
            'firstName' => 'required|max:60',
            'lastName' => 'required|max:60',
            'phone' => 'required|max:15|regex:/^01[0-9]{1}[0-9]{7,8}$/',
            'address' => 'required|max:100',
            'postcode' => 'required|max:7',
            'city' => 'required|max:30',
            'state' => 'required|max:30',
        ]);

        $existing_purchase = Purchase::find($req->id);

        if ($existing_purchase->status == "completed") {
            return redirect('/')->withErrors('Purchase is completed cannot be edit.');
        }

        if ($existing_purchase && ($existing_purchase->buyer_id == $req->user()->id || $req->user()->is_admin())) {

            $purchase = new Purchase();
            $purchase->fill($req->all());
            $purchase->buyer_id = $req->user()->id;

            // check if there is difference between existing data and current data
            $diff = false;
            foreach ($purchase->attributesToArray() as $key => $val) {
                $compare = $val == $existing_purchase->attributesToArray()[$key];
                
                if ($compare == null) {
                    $diff = true;
                    $existing_purchase->$key = $val;
                }
            }

            if ($diff) {
                $existing_purchase->save();
                return redirect('/')->withMessage('Purchase has been updated.');
            } else {
                return redirect('/')->withErrors('No changes made.');
            }
        } else {
            return redirect('/')->withErrors('You have not sufficient permission.');
        }
    }

    // deleting data from db
    public function delete(Request $req) {
        $purchase = Purchase::find($req->input('purchase_id'));

        if ($purchase && $purchase->buyer_id == $req->user()->id || $req->user()->is_admin()) {
            $purchase->delete();
            return redirect('/purchases')->withMessage('Purchase deleted Successfully');
        } else {
            return redirect('/purchases')->withErrors('Invalid Operation. You have not sufficient permissions');
        }
    }
}
