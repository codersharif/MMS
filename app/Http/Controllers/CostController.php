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

class CostController extends Controller {

    public function index() {
        $users = User::all();

        $Tsavings = Savings::groupBy('user_id')
                        ->select(DB::raw('sum(savings) as savings'), 'user_id')->get();

        $totalCost = Cost::select(DB::raw('sum(cost) as cost'))->first();


        $milArr = Count::select('id', 'user_id', 'status', 'date')->get();

        $totalmil = $statusArr = $milTypeArr = $totalTypeArr = [];
        if ($milArr->isNotEmpty()) {
            foreach ($milArr as $mil) {
                $statusArr['mil'][$mil->id] = $mil->status;
                $milTypeArr['mil'][$mil->status][$mil->id] = $mil->id;
                //lunch & diner
                $totalTypeArr['mil'][$mil->status] = count($milTypeArr['mil'][$mil->status]);

                $totalmil['mil'] = count($statusArr['mil']);
            }
        }

        


        $userAmount = $totalSavings = [];
        if ($Tsavings->isNotEmpty()) {
            foreach ($Tsavings as $val) {
                $userAmount['savings'][$val->user_id] = $val->savings;
                $totalSavings['savings'] = array_sum($userAmount['savings']);
            }
        }
        
        
        $targetArr = Cost::join('users','users.id','=','cost.user_id')
                ->select('cost.id','cost.user_id','cost.cost'
                        ,'cost.created_at','users.name')
                ->orderBy('cost.created_at','ASC')
                ->get();


        return view('cost.index', compact('users', 'Tsavings', 'totalCost'
                        , 'totalmil', 'totalTypeArr', 'totalSavings'
                        , 'userAmount', 'targetArr'));
    }

}
