<?php
$user = DB::table('users')->find($user_id);

$Tsavings = DB::table('savings')
                ->where('user_id', $user->id)
                ->groupBy('user_id')
                ->select(DB::raw('sum(savings) as savings'), 'user_id')->first();

$totalCost = DB::table('cost')->select(DB::raw('sum(cost) as cost'))->first();

$milArr = DB::table('count')->select('id', 'user_id', 'status', 'date')->get();

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


if (!empty($totalCost)) {
    $milRate = 0;
    $totalMil = $totalmil['mil'] ?? 0;
    if ($totalMil != 0) {
        $milRate = number_format($totalCost->cost / $totalMil, '2');
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h4 class="">Dear Member,</h4>
            <h5>Hi,{{$user->name}}</h5>
            <button class="btn btn-danger">Avarage mill rate : &#2547; {{$milRate??0}} </button>

            <h4 class="mt-1">Lunch : {{$userMilTypeArr[$user->id][1]??0}}</h4>
            <h4 class="mt-1">Diner : {{$userMilTypeArr[$user->id][2]??0}}</h4>
            <h4 class="mt-1">Guest : {{$userMilTypeArr[$user->id][3]??0}}</h4>
            <h4 class="mt-1">Extra : {{$userMilTypeArr[$user->id][4]??0}}</h4>
            <h4 class="mt-1">
                <?php
                $lunch = !empty($userMilTypeArr[$user->id][1]) ? $userMilTypeArr[$user->id][1] : 0;
                $diner = !empty($userMilTypeArr[$user->id][2]) ? $userMilTypeArr[$user->id][2] : 0;
                $guest = !empty($userMilTypeArr[$user->id][3]) ? $userMilTypeArr[$user->id][3] : 0;
                $extra = !empty($userMilTypeArr[$user->id][4]) ? $userMilTypeArr[$user->id][4] : 0;
                $userTotalMil = $lunch + $diner + $guest + $extra;
                $userTotalMilRate = $userTotalMil * $milRate ?? 0;
                $userAmt = !empty($Tsavings->savings) ? $Tsavings->savings : 0;
                ?>
                Total mill : {{$userTotalMil}}</h4>
            <h4 class="mt-1">Mil rate : &#2547; {{$userTotalMilRate}}</h4>
            <h4 class="mt-1">
                Savings : &#2547; {{$userAmt}}
            </h4>
            <h4 class="mt-1">Your Balance : &#2547; {{$userAmt - $userTotalMilRate}}</h4>


            <div class="mt-5">
                <h5>Thanks!</h5>
                Regards,<br/>
                Manager<br/>
                Meal  Management System 
            </div>

        </div>
    </div>
</div>