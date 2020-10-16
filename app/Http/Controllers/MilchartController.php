<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\milSavings;
use App\milCost;
use App\milCount;
use DB;

class MilchartController extends Controller {

    public function count() {
        $users = User::all();
        return view('milchart.count', compact('users'));
    }

    public function savings() {
        $users = User::all();
        $totalAmount = milSavings::select(DB::raw('sum(savings) as totalAmount'))->get();

        return view('milchart.savings', compact('users', 'totalAmount'));
    }

    public function savingsSave() {

        $validateArticle = request()->validate([
            'user_id' => 'required',
            'savings' => 'required'
        ]);

        milSavings::create($validateArticle);

        return redirect('home')->with('status', 'Amount Added');
    }

    public function cost() {
        $totalCost = milCost::select(DB::raw('sum(cost) as cost'))->get();
        return view('milchart.cost', compact('totalCost'));
    }

    public function costSave() {
        $validateArticle = request()->validate([
            'cost' => 'required'
        ]);

        milCost::create($validateArticle);

        return redirect('home')->with('status', 'Amount Added');
    }

    public function milcount() {

        $mil = new milCount;
        $mil->user_id = request('user_id');
        $mil->status = request('status');
        $mil->date = date('Y-m-d');

        if ($mil->save()) {
            return redirect('home')->with('status', 'Mil Added');
        } else {
            return redirect('home')->with('status', 'Mil Added Faild');
        }
    }
    
    

}
