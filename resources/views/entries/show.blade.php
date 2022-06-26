@extends('layouts.app')
@section('content')
    <div class="container">
        @if ( Session::has('errors'))
            <div class="alert alert-danger" align="center">
                <p>{{ $errors }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-dark bg-dark">
                        <form action="{{action('EntryController@destroy', $entry->id)}}" class="form-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-sm btn-danger rounded-0" value="{{__('Delete this entry')}}">
                        </form>

                    @if($entry->status == 'pending')
                        <form action="{{action('EntryController@update', $entry->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success btn-sm rounded-0" type="submit"><i class="fas fa-check"></i> {{__('Close this entry')}}</button>
                        </form>
                        @endif
                </nav>

            </div>
        </div>
        <div class="row">
            <div class="col mt-5">
                <div class="card text-center">
                    <div class="card-body">
                        <span class="lead"> {{$entry->survey()->title}}<br></span>@switch($entry->status)
                            @case('pending')
                            <button class="btn btn-danger btn-sm rounded-0"><i class="fas fa-forward"></i> {{__('PENDING')}}</button>
                            @break
                            @case('closed')
                            <button class="btn btn-success btn-sm rounded-0"><i class="fas fa-check"></i> {{__('CLOSED')}}</button>
                            @break
                        @endswitch
                        <div class="table-responsive">
                            <table class="table">
                                <th>Pytanie</th>
                                <th>Odpowiedź</th>
                                @foreach($entry->answers() as $answer)
                                    <tr>
                                        <th>{{$answer->question()->content}}</th>
                                        <td>{{$answer->value}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
