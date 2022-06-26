@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{__('Create a new survey')}}</div>
            <div class="card-body">
                <form action="{{action('SurveyController@store')}}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">{{__('Survey title')}}</label>
                                <input type="text" class="form-control" name="title" required value="{{old('title')}}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="title">{{__('Survey owner')}}</label>
                                <input type="text" class="form-control" name="owner_id" required readonly value="{{Auth::user()->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">{{__('Survey description')}}</label>
                                <textarea  class="form-control" name="description" required value="{{old('description')}}" required></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>a</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="title">{{__('Text for customer')}}</label>
                                <textarea  class="form-control" name="customer_text" required value="{{old('customer_text')}}" required></textarea>
                                <small class="text-muted hint">{{__('This text will be  visible for customer during filling the survey')}}</small>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="addDefaultQuestions" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{__('Add default contact questions')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-primary btn-sm rounded-0">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
