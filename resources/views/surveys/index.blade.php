@extends('layouts.app')
@section('content')
   <div class="container">
       <div class="row ">
           <div class="col">
               <div class="card">
                   <div class="card-header">{{ __('Your surveys') }}
                       <a class="btn btn-sm btn-success float-right" href="{{route('surveys.create')}}">{{__('Create a survey')}}</a>
                   </div>

                   <div class="card-body p-0">
                       @if (session('status'))
                           <div class="alert alert-success" role="alert">
                               {{ session('status') }}
                           </div>
                       @endif

                       @if(\App\Survey::all()->count() == 0)
                           <h1 class="text-muted text-center">{{__('No surveys avaliable')}}</h1>
                       @else
                           <div class="table-responsive">
                               <table class="table">
                                   <thead>
                                   <th>{{__('ID')}}</th>
                                   <th>{{__('Survey Entries')}}</th>
                                   <th>{{__('Title')}}</th>
                                   <th>{{__('Description')}}</th>
                                   <th>{{__('Owner')}}</th>
                                   <th>Link</th>
                                   </thead>
                                   <tbody>
                                   @foreach(\App\Survey::all() as $survey)
                                       <tr>
                                           <td>{{$loop->index+1 }}</td>
                                           <td><span class="badge badge-danger">{{$survey->entries()->count()}}</span></td>
                                           <td><a href="{{route('surveys.show', $survey->id)}}">{{$survey->title}}</a></td>
                                           <td>{{$survey->description}}</td>
                                           <td>{{\App\User::where('id', $survey->owner_id)->pluck('name')->first()}}</td>
                                           <th><a href="{{url('/fill').'/'.$survey->id}}?agent_id={{Auth::user()->id}}" target="_blank" class="btn btn-sm btn-primary">{{__('Send')}}</a></th>
                                       </tr>
                                   @endforeach
                                   </tbody>
                               </table>
                           </div>
                       @endif
                   </div>
               </div>
           </div>
       </div>
   </div>

@endsection
