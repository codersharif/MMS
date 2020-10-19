@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>User List</span>
                    <a href="{{route('cost')}}" class="btn btn-danger px-5">Add Meal Cost</a>
                    <a href="{{route('savings')}}" class="btn btn-info px-5">Add Meal Savings</a>
                    <div class="mt-2">
                        <span class="btn btn-warning bold">
                            Total Saving : &#2547; {{$totalSavings['savings']??0}}
                        </span> -
                        <span class="btn btn-secondary bold">
                            <?php
                            $milRate = 0;
                            ?>
                            @if(!empty($totalCost))
                            <?php
                            $totalMil = $totalmil['mil'] ?? 0;
                            if ($totalMil != 0) {
                                $milRate = number_format($totalCost->cost / $totalMil, '2');
                            } else {
                                echo '';
                            }
                            ?>
                            Total Cost : &#2547; {{$totalCost->cost}}</span> -
                        @endif
                        <span class="btn btn-danger bold">Total Mil : {{$totalmil['mil']??0}}</span> -
                        <span class="btn btn-success bold">Total Lunch : {{$totalTypeArr['mil'][1]??0}}</span> -
                        <span class="btn btn-info bold">Total Diner : {{$totalTypeArr['mil'][2]??0}}</span>
                        <span class="btn btn-dark bold">Mil Rate : &#2547; {{$milRate??0}}</span>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="table table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Lunch</th>
                                    <th scope="col">Diner</th>
                                    <th scope="col">Total Mil</th>
                                    <th scope="col">Meal Rate</th>
                                    <th scope="col">Savings</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 0;
                                ?>
                                @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{++$i}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td class="bold">{{$userMilTypeArr[$user->id][1]??0}}</td>
                                    <td class="bold">{{$userMilTypeArr[$user->id][2]??0}}</td>
                                    <td class="bold">
                                        <?php
                                        $lunch = !empty($userMilTypeArr[$user->id][1]) ? $userMilTypeArr[$user->id][1] : 0;
                                        $diner = !empty($userMilTypeArr[$user->id][2]) ? $userMilTypeArr[$user->id][2] : 0;
                                        $userTotalMil = $lunch + $diner;
                                        $userTotalMilRate = $userTotalMil * $milRate ?? 0;
                                        $userAmt = !empty($userAmount['savings'][$user->id]) ? $userAmount['savings'][$user->id] : 0;
                                        ?>
                                        {{$userTotalMil}} 
                                    </td>
                                    <td class="bold" width="100">&#2547; {{$userTotalMilRate}}</td>
                                    <td class="bold" width="100">&#2547; {{!empty($userAmount['savings'][$user->id])?$userAmount['savings'][$user->id]:0}}</td>
                                    <td class="bold" width="100">
                                        &#2547; {{$userAmt - $userTotalMilRate}}
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                @if(empty($todayCheck[$user->id][1][date('Y-m-d')]))
                                                <form class="mt-1 mb-1" method="POST" action="{{URL::to('mil/count')}}">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{$user->id}}"/>
                                                    <input type="hidden" name="status" value="1"/>
                                                    <button type="submit" class="btn btn-warning btn-sm" title="clicked">Lunch</button>
                                                </form>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                @if(empty($todayCheck[$user->id][2][date('Y-m-d')]))
                                                <form method="POST" action="{{URL::to('mil/count')}}">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{$user->id}}"/>
                                                    <input type="hidden" name="status" value="2"/>
                                                    <button type="submit" class="btn btn-success btn-sm" title="clicked">Diner</button>
                                                </form>
                                                @endif
                                            </div>
                                            <div class="col-md-3">
                                                <form action="{{route('email.send')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{$user->id}}"/>
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Email Send">
                                                       <i class="fa fa-envelope"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
