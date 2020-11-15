@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    Add Cost
                    <div class="card-tools">
                        <button class="btn btn-danger">
                            Total Cost : 
                            @foreach($totalCost as $amount)
                            {{$amount->cost}} tk
                            @endforeach
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="post" action="{{URL::to('cost/save')}}">
                                @csrf
                                <div class="form-group">
                                    <select name="user_id" class="form-control">
                                        <option value="">Select User</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="label label-sm">Amount</label>
                                    <input type="number" name="cost" class="form-control"/>
                                    @error('cost')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--COST DATA-->
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">
                    <div class="title">
                        List of Marketers
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="align-middle" scope="col">#</th>
                                <th class="align-middle" scope="col">Date</th>
                                <th class="align-middle" scope="col">Name</th>
                                <th class="align-middle" scope="col">Taka</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!$targetArr->isEmpty())

                            <?php
                            $i = 0;
                            ?>
                            @foreach($targetArr as $target)
                            <tr>
                                <th class="align-middle" scope="row">{{++$i}}</th>
                                <td class="align-middle">{{Helper::formatDateTime($target->date)}}</td>
                                <td class="align-middle">{{$target->name}}</td>
                                <td class="align-middle">{{$target->taka}}</td>
                              
                            </tr>
                            @endforeach
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
