@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @include('layouts.flash')

            <div class="card mt-3">
                <div class="card-header">
                    <div class="title">
                        <span class="btn btn-sm btn-warning bold mt-1">
                            Total Saving: &#2547; {{$totalSavings['savings']??0}}
                        </span> -
                        <span class="btn btn-sm btn-danger bold mt-1">
                            <?php
                            $milRate = 0;
                            ?>
                            @if(!empty($totalCost))
                            <?php
                            $totalMil = $totalmil['mil'] ?? 0;
                            if ($totalMil != 0) {
                                $milRate = number_format($totalCost->cost / $totalMil, '2');
                            } else {
                                echo 0;
                            }
                            ?>
                            Total Cost: &#2547; {{$totalCost->cost}}</span> -
                        @endif
                        <span class="btn btn-sm btn-secondary bold mt-1">Balance: &#2547; {{($totalSavings['savings']??0) - $totalCost->cost }}</span>
                        <span class="btn btn-sm btn-success bold mt-1">
                            Total: (Meal-{{$totalmil['mil']??0}}),(Lunch-{{$totalTypeArr['mil'][1]??0}}),
                            (Diner-{{$totalTypeArr['mil'][2]??0}})


                        </span> -
                        <span class="btn btn-sm btn-info bold mt-1">Meal Rate : &#2547; {{$milRate??0}}</span>
                    </div>

                    <div class="card-tools mt-1">
                        <a href="{{route('cost')}}" class="btn btn-sm btn-danger px-2">Add Cost</a>
                        <a href="{{route('savings')}}" class="btn btn-sm btn-info px-2">Add Savings</i></a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="align-middle" scope="col">#</th>
                                <th class="align-middle" scope="col">Name</th>
                                <th class="align-middle" scope="col">Email</th>
                                <th class="align-middle" scope="col">Lunch</th>
                                <th class="align-middle" scope="col">Diner</th>
                                <th class="align-middle" scope="col">Guest</th>
                                <th class="align-middle" scope="col">Extra</th>
                                <th class="align-middle" scope="col">Total Meal</th>
                                <th class="align-middle" scope="col">Meal Rate</th>
                                <th class="align-middle" scope="col">Savings</th>
                                <th class="align-middle" scope="col">Balance</th>
                                <th class="align-middle" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $i = 0;
                            ?>
                            @foreach($users as $user)
                            <tr>
                                <th class="align-middle" scope="row">{{++$i}}</th>
                                <td class="align-middle">{{$user->name}}</td>
                                <td class="align-middle">{{$user->email}}</td>
                                <td class="align-middle bold">{{$userMilTypeArr[$user->id][1]??0}}</td>
                                <td class="align-middle bold">{{$userMilTypeArr[$user->id][2]??0}}</td>
                                <td class="align-middle bold">{{$userMilTypeArr[$user->id][3]??0}}</td>
                                <td class="align-middle bold">{{$userMilTypeArr[$user->id][4]??0}}</td>
                                <td class="align-middle bold">
                                    <?php
                                    $lunch = !empty($userMilTypeArr[$user->id][1]) ? $userMilTypeArr[$user->id][1] : 0;
                                    $diner = !empty($userMilTypeArr[$user->id][2]) ? $userMilTypeArr[$user->id][2] : 0;
                                    $guest = !empty($userMilTypeArr[$user->id][3]) ? $userMilTypeArr[$user->id][3] : 0;
                                    $extra = !empty($userMilTypeArr[$user->id][4]) ? $userMilTypeArr[$user->id][4] : 0;
                                    $userTotalMil = $lunch + $diner + $guest + $extra;


                                    $userTotalMilRate = (float)(!empty($milRate)?$milRate:0) * (float)$userTotalMil;

                                    $userAmt = !empty($userAmount['savings'][$user->id]) ? $userAmount['savings'][$user->id] : 0;
                                    ?>
                                    {{$userTotalMil}} 
                                </td>
                                <td class="align-middle bold" width="100">&#2547; {{$userTotalMilRate}}</td>
                                <td class="align-middle bold" width="100">&#2547; {{!empty($userAmount['savings'][$user->id])?$userAmount['savings'][$user->id]:0}}</td>
                                <td class="align-middle bold" width="100">
                                    <?php
                                    $balance = $userAmt - $userTotalMilRate;
                                    $balance = number_format($balance, '2');
                                    ?>
                                    &#2547; {{ $balance}}

                                </td>
                                <td class="align-middle">
                                    <!--<div>-->
                                    <span>
                                        @if(empty($todayCheck[$user->id][1][date('Y-m-d')]))
                                        <form class="mt-1 mb-1" method="POST" action="{{URL::to('/count')}}">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$user->id}}"/>
                                            <input type="hidden" name="status" value="1"/>
                                            <button type="submit" class="btn btn-warning btn-sm" title="clicked to Lunch Meal">
                                                <i class="fas fa-coffee"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </span>
                                    <span>
                                        @if(empty($todayCheck[$user->id][2][date('Y-m-d')]))
                                        <form method="POST" action="{{URL::to('/count')}}">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$user->id}}"/>
                                            <input type="hidden" name="status" value="2"/>
                                            <button type="submit" class="btn btn-success btn-sm mb-2" title="clicked to Diner Meal">
                                                <i class="fas fa-rocket"></i>
                                            </button>
                                        </form>
                                        @endif

                                    </span>
                                    <span>
                                        <form method="POST" action="{{URL::to('/count')}}">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$user->id}}"/>
                                            <input type="hidden" name="status" value="3"/>
                                            <button type="submit" class="btn btn-secondary btn-sm mb-2" title="clicked to Guest Meal">
                                                <i class="fas fa-user-plus"></i>
                                            </button>
                                        </form>
                                    </span>
                                    <span>
                                        <form method="POST" action="{{URL::to('/count')}}">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$user->id}}"/>
                                            <input type="hidden" name="status" value="4"/>
                                            <button type="submit" class="btn btn-danger btn-sm mb-2" title="clicked to Extra Meal">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </form>
                                    </span>
                                    <span>
                                        <form action="{{route('email.send')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$user->id}}"/>
                                            <button type="submit" class="btn btn-info btn-sm" title="Email Send">
                                                <i class="fa fa-envelope"></i>
                                            </button>
                                        </form>
                                    </span>

                                    <!--</div>-->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
