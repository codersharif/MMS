@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Contact</div>
                <div class="card-body">
                    <form action="{{route('payment.send')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-lg btn-info">Payment</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Contact</div>
                <div class="card-body">
                    <form action="{{route('payment.eventAction')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-lg btn-info">event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
