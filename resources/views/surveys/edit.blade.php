@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{__('Update survey')}}</div>
            <div class="card-body">
                <form action="{{action('SurveyController@update', $survey->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">{{__('Survey title')}}</label>
                                <input type="text" class="form-control" name="title" required value="{{$survey->title}}">
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
                                <textarea  class="form-control" name="description" required required>{{$survey->description}}</textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="title">{{__('Text for customer')}}</label>
                                <textarea  class="form-control" name="customer_text" required  required>{{$survey->customer_text}}</textarea>
                                <small class="text-muted hint">{{__('This text will be  visible for customer during filling the survey')}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" class="btn btn-primary btn-sm rounded-0">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
