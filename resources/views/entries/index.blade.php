@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{__('Entries list')}}</div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <th>{{__('Entry ID')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Survey')}}</th>
                                <th>{{__('Filled at')}}</th>
                                <th></th>
                                </thead>
                                <tbody>
                                @foreach($entries as $entry)
                                    <tr>
                                        <td>{{$entry->id}}</td>
                                        <td>
                                            @switch($entry->status)
                                            @case('pending')
                                                <button class="btn btn-danger btn-sm rounded-0"><i class="fas fa-forward"></i> {{__('PENDING')}}</button>
                                                @break
                                                @case('closed')
                                                <button class="btn btn-success btn-sm rounded-0"><i class="fas fa-check"></i> {{__('CLOSED')}}</button>
                                                @break
                                            @endswitch
                                        </td>
                                        <td>{{$entry->survey()->title}}</td>
                                        <td>{{$entry->created_at}}</td>
                                        <td><a href="/entries/{{$entry->id}}" class="btn btn-sm btn-primary">{{__('Details')}}</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ $entries->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
