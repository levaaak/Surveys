@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-dark bg-dark">
                        <form action="{{action('SurveyController@destroy', $survey->id)}}" class="form-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-sm btn-danger rounded-0" value="{{__('Delete this survey')}}">
                        </form>
                        <button class="btn btn-warning btn-sm rounded-0">{{__('Edit this survey')}}</button>
                </nav>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">{{__('Survey details')}} - {{$survey->title}}
                                <a href="{{route('surveys.edit', $survey->id)}}" class="btn btn-sm btn-primary float-right">{{__('Edit')}}</a>
                            </div>
                            <div class="card-body p-0 text-center">
                                <div class="table-responsive">
                                    <table class="table">

                                        <tr>
                                            <th>{{__('Survey Title')}}</th>
                                            <td>{{$survey->title}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{__('Survey description')}}</th>
                                            <td>{{$survey->description}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{__('Customer text')}}</th>
                                            <td>{{$survey->customer_text}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{__('Owner')}}</th>
                                            <td>{{\App\User::where('id', $survey->owner_id)->pluck('name')->first()}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{__('Questions')}}</th>
                                            <td>
                                                {{$survey->questions()->count()}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="card">
                            <div class="card-header">{{__('Questions for survey #').$survey->id}}</div>
                            <div class="card-body">
                                @if($survey->questions()->count() == 0)
                                    <h1 class="text-muted text-center">{{__('This survey doesn\'t have any questions yet')}}</h1>
                                @else
                                    <ul class="list-group list-group-flush">
                                        @foreach($survey->questions() as $question)
                                            <li class="list-group-item">
                                                {{$loop->index+1 }}.
                                                {{$question->content}}
                                                [{{$question->type}}]
                                                @if($question->required)<sup class="text-danger">*</sup>@endif
                                                <div class="dropdown float-right">
                                                    <button class="btn btn-sm" type="button" > <i class="fas fa-pencil"></i></button>
                                                    <button class="btn btn-sm" type="button" > <i class="fas fa-trash"></i></button>

                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">{{__('Add questions')}}</div>
                    <div class="card-body">
                        @include('questions.create')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
