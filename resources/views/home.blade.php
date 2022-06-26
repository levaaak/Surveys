@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card bg-danger text-white  shadow-lg">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-3" style="border-right: 2px solid white"><h1>{{App\Entry::where('status','pending')->count()}}</h1></div>
                        <div class="col">
                            <h2><i class="fas fa-forward"></i> {{__('PENDING ENTRIES')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-success text-white  shadow-lg">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-3" style="border-right: 2px solid white"><h1>{{App\Entry::where('status','closed')->count()}}</h1></div>
                        <div class="col">
                            <h2><i class="fas fa-forward"></i> {{__('CLOSED ENTRIES')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-warning text-white  shadow-lg">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-3" style="border-right: 2px solid white"><h1>{{App\User::all()->count()}}</h1></div>
                        <div class="col">
                            <h2><i class="fas fa-users"></i> {{__('ACTIVE USERS')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
