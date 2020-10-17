<?php
/*
  |App version 1.0
  |@author shariful islam khan
  
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\milCost;
use App\milCount;
use App\milSavings;
use DB;

class HomeController extends Controller {

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
    public function index() {
        $users = User::all();

        $Tsavings = milSavings::groupBy('user_id')
                        ->select(DB::raw('sum(savings) as savings'), 'user_id')->get();

        $totalCost = milCost::select(DB::raw('sum(cost) as cost'))->first();


        $milArr = milCount::select('id', 'user_id', 'status', 'date')->get();

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


        return view('milchart.home', compact('users', 'Tsavings', 'totalCost'
                        , 'totalmil', 'totalTypeArr', 'userMilTypeArr'
                        , 'totalSavings', 'userAmount', 'todayCheck'));
    }

}
