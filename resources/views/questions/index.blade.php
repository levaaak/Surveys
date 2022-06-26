@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">{{__('Questions for survey #').$survey->id}}</div>
        <div class="card-body">
            @include('questions.create')
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
                                <button class="btn btn-sm  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-ellipsis-v"></i></button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

@endsection
