<?php

/*
  |App version 1.0
  |@author shariful islam khan

 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Savings;
use App\Cost;
use App\Count;
use DB;
use Session;

class MealController extends Controller {

    public function index() {
        $users = User::all();

        $Tsavings = Savings::groupBy('user_id')
                        ->select(DB::raw('sum(savings) as savings'), 'user_id')->get();

        $totalCost = Cost::select(DB::raw('sum(cost) as cost'))->first();


        $milArr = Count::select('id', 'user_id', 'status', 'date')->get();

        $totalmil = $statusArr = $milTypeArr = $totalTypeArr = $userMilArr = [];
        $userMilTypeArr = $todayCheck = [];
        if ($milArr->isNotEmpty()) {
            foreach ($milArr as $mil) {
                $statusArr['mil'][$mil->id] = $mil->status;

                $milTypeArr['mil'][$mil->status][$mil->id] = $mil->id;

                //lunch & diner
                $totalTypeArr['mil'][$mil->status] = count($milTypeArr['mil'][$mil->status]);


                $totalmil['mil'] = count($statusArr['mil']);

                $userMilArr[$mil->user_id][$mil->status][$mil->id] = 1;
                $userMilTypeArr[$mil->user_id][$mil->status] = count($userMilArr[$mil->user_id][$mil->status]);

                $todayCheck[$mil->user_id][$mil->status][$mil->date] = $mil->date;
            }
        }




        $userAmount = $totalSavings = [];
        if ($Tsavings->isNotEmpty()) {
            foreach ($Tsavings as $val) {
                $userAmount['savings'][$val->user_id] = $val->savings;
                $totalSavings['savings'] = array_sum($userAmount['savings']);
            }
        }


        return view('meal.index', compact('users', 'Tsavings', 'totalCost'
                        , 'totalmil', 'totalTypeArr', 'userMilTypeArr'
                        , 'totalSavings', 'userAmount', 'todayCheck'));
    }

//    public function costm() {
//        $users = User::all();
//        return view('meal.count', compact('users'));
//    }

    public function savings() {
        $users = User::all();
        $totalAmount = Savings::select(DB::raw('sum(savings) as totalAmount'))->get();

        return view('meal.savings', compact('users', 'totalAmount'));
    }

    public function savingsSave() {

        $validateArticle = request()->validate([
            'user_id' => 'required',
            'savings' => 'required'
        ]);


        if (Savings::create($validateArticle)) {
            Session::flash('success', 'Amount Added Succesfully');
            return redirect('meal');
        } else {
            Session::flash('error', 'Amount could not be Added');
            return redirect('meal');
        }
    }

    public function cost() {
        $users = User::all();
        $totalCost = Cost::select(DB::raw('sum(cost) as cost'))->get();
        
        $targetArr=Cost::join('users','users.id','=','cost.user_id')
                ->select('users.name','cost.cost as taka','cost.created_at as date')->get();
        
 
        return view('meal.cost', compact('totalCost', 'users','targetArr'));
    }

    public function costSave() {
        $validateArticle = request()->validate([
            'user_id' => 'required',
            'cost' => 'required'
        ]);



        if (Cost::create($validateArticle)) {
            Session::flash('success', 'Amount Added Succesfully');
            return redirect('meal');
        } else {
            Session::flash('error', 'Amount could not be Added');
            return redirect('meal');
        }
    }

    public function countStore() {

        $meal = new Count;
        $meal->user_id = request('user_id');
        $meal->status = request('status');
        $meal->date = date('Y-m-d');

        if ($meal->save()) {
            Session::flash('success', 'Meal Added Succesfully');
            return redirect('meal');
        } else {
            Session::flash('error', 'Meal could not be Added');
            return redirect('meal');
        }
    }

}
