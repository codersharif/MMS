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
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="align-middle" scope="col">#</th>
                                <th class="align-middle" scope="col">Date</th>
                                <th class="align-middle" scope="col">{{ __('label.NAME')}}</th>
                                <th class="align-middle" scope="col">Taka</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!$targetArr->isEmpty())

                            <?php
                            $i = 0;
                            $totalSaving=0;
                            ?>
                            @foreach($targetArr as $target)
                            <tr>
                                <th class="align-middle" scope="row">{{++$i}}</th>
                                <td class="align-middle">{{Helper::formatDateTime($target->created_at)}}</td>
                                <td class="align-middle">{{$target->name}}</td>
                                <td class="align-middle">&#2547; {{$target->savings}}</td>
                                <?php
                                
                                $totalSaving+=$target->savings;
                                ?>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="align-middle text-bold">Total</td>
                                <td colspan="3" class="align-middle text-bold">&#2547; {{$totalSaving}}</td>
                            </tr>
                            @endif
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
