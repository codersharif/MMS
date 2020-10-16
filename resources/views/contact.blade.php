@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contact</div>
                <div class="card-body">
                    <h3>
                        @if(session('message'))
                        {{ session('message')}}
                        @endif
                    </h3>
                    <form action="{{route('contact.send')}}" method="post">
                        @csrf
                        
                        <div class="form-group">
                            <input type="text" name="email" class="form-control"/>
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-lg btn-info">Send Email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
