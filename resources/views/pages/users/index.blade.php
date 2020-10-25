@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ URL::to('users/create'.Helper::queryPageStr($qpArr)) }}">
                        <button class="btn btn-success btn-lg">Create</button>             
                    </a>

                </div>
                <div class="card-body">
                    @include('layouts.flash')
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <td>Sl</td>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $page = Request::get('page');
                                $page = empty($page) ? 1 : $page;
                                $sl = ($page - 1) * Session::get('paginatorCount');
                                ?>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{++$sl}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <div>
                                            <a class="btn btn-xs btn-primary tooltips vcenter" title="Edit" href="{{ URL::to('users/' . $user->id . '/edit'.Helper::queryPageStr($qpArr)) }}">
                                                Edit
                                            </a>

                                            <form method="post" action="{{ URL::to('users/' . $user->id .'/'.Helper::queryPageStr($qpArr)) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-xs btn-danger delete tooltips vcenter" type="submit">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('layouts.paginator')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
