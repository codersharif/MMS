@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Add Saving</h3>
                    <div class="card-tools">
                        <button class="btn btn-danger">
                            Total Saving : 
                            @foreach($totalAmount as $amount)
                            {{$amount->totalAmount}} tk

                            @endforeach
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6" data-select2-id="29">
                            <form method="post" action="{{URL::to('saving/save')}}">
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
                                    <input type="number" name="savings" class="form-control"/>
                                    @error('savings')
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
</div>
@endsection
