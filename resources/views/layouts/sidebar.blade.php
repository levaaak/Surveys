<!-- Scripts -->

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
    /* The side navigation menu */
    .sidebar {
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #f1f1f1;
        position: fixed;
        height: 100%;
        overflow: auto;
    }

    /* Sidebar links */
    .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;
    }

    /* Active/current link */
    .sidebar a.active {
        background-color: #3bb149;
        color: white;
    }

    /* Links on mouse-over */
    .sidebar a:hover:not(.active) {
        background-color: #555;
        color: white;
    }

    /* Page content. The value of the margin-left property should match the value of the sidebar's width property */
    div.content {
        margin-left: 200px;
        padding: 1px 16px;
        height: 1000px;
    }

    /* On screens that are less than 700px wide, make the sidebar into a topbar */
    @media screen and (max-width: 700px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }
        .sidebar a {float: left;}
        div.content {margin-left: 0;}
    }

    /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
    @media screen and (max-width: 400px) {
        .sidebar a {
            text-align: center;
            float: none;
        }
    }
</style>
<!-- The sidebar -->
<div class="sidebar">

    <h3 class="bg-kuc text-center" style="color:white"> {{ config('app.name', 'Laravel') }}</h3>

    <ul class="nav nav-pills flex-column mb-auto">
        <a class=" @if(Route::current()->getName() == 'home') active @endif" href="{{route('home')}}"><i class="fas fa-dashboard"></i> {{ __('Dashboard') }}</a>
        <a class=" @if(Route::current()->getName() == 'surveys.index') active @endif" href="{{route('surveys.index')}}"><i class="fas fa-copy"></i> {{ __('Surveys') }}</a>
        @can('entries_view')<a class=" @if(Route::current()->getName() == 'entries.index' ) active @endif" href="{{route('entries.index')}}"><i class="fas fa-sign-in"></i> {{ __('Entries') }} @if(\App\Entry::where('status', 'pending')->exists())<span class="badge badge-danger float-right">{{\App\Entry::where('status', 'pending')->count()}}</span>@endif</a>@endcan
        @role('admin')<a class="@if(Route::current()->getName() == 'users.index') active @endif" href="{{route('users.index')}}"><i class="fas fa-users"></i> {{ __('Users') }}</a>@endrole
    </ul>

    <div style="position: absolute; bottom: 0; width: 100%;" class="bg-kuc">
        <hr>
        <!-- Default dropup button -->
        <div class="btn-group dropup" style="width:100%!important;">
            <button type="button"  class="btn  dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="https://www.fiemar.pl/wp-content/themes/fortuna/images/user.png" alt="" width="40px" height="40px" style="border-radius: 50px">
                {{Auth::user()->name}}
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
