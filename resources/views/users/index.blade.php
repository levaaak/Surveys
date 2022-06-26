@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        {{__('Users')}}
                    <a href="{{route('users.create')}}" class="btn btn-sm btn-success float-right rounded-0">{{__('Create user')}}</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <th>{{__('Role')}}</th>
                                <th>{{__('Name and surname')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Phone number')}}</th>
                                <th></th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td><span class="badge badge-info text-uppercase">{{$user->getRoleNames()->first()}}</span></td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->number}}</td>
                                        <td>
                                            <a href="{{action('UserController@show', $user->id)}}" class="btn btn-sm btn-info rounded-0">{{__('Details')}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer"> {{ $users->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
