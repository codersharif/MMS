@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Cost Form
                    <a href="{{route('home')}}" class="btn btn-success px-5">User List</a>
                    <button class="btn btn-danger">
                        Total Cost : 
                        @foreach($totalCost as $amount)
                        {{$amount->cost}} tk
                        @endforeach
                    </button>
                </div>

                <div class="card-body">
                    <form method="post" action="{{URL::to('cost/save')}}">
                        @csrf

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
@endsection
