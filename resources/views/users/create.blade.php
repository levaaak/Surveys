@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card rounded-0">
                    <div class="card-header">{{__('Create new user')}}</div>
                    <div class="card-body">
                        <form action="{{action('UserController@store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">{{__('Name and surname')}}</label>
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="phone">{{__('Phone number')}}</label>
                                        <input type="number" minlength="9" class="form-control" name="phone" value="{{old('phone')}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">{{__('E-mail')}}</label>
                                        <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <input type="submit" class="btn btn-sm btn-success rounded-0" value="Save User">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
