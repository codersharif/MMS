@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{URL::to('users')}}">
                        <button class="btn btn-success btn-lg">Back</button>             
                    </a>
                </div>
                <div class="card-body">
                    <form method="post" action="{{URL::to('/users/store')}}">
                        <input type="hidden" name="filter" value="{{Helper::queryPageStr($qpArr)}}"/>
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name"  class="form-control"/>
                            @error('name')
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email"  class="form-control"/>
                            @error('email')
                            <span class="text-danger">{{$errors->first('email')}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password"  class="form-control"/>
                            @error('password')
                            <span class="text-danger">{{$errors->first('password')}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="conf_password">Confirm Password</label>
                            <input type="password" name="conf_password" id="conf_password"  class="form-control"/>
                            @error('conf_password')
                            <span class="text-danger">{{$errors->first('conf_password')}}</span>
                            @enderror 
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
