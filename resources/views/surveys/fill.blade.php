<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
    .user {
        display: inline-block;
        width: 50px;
        height: 50px;
        border-radius: 50%;


        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
    }
    body{
        background-color: #3bb149;
    }

</style>
<title>{{$survey->title}}</title>
<div class="container text-center align-items-center">
    <div class="card rounded-0 shadow-lg mt-5">
        <div class="card-body">
            <div class="row ">
            <div class="col"> <h1 class="text-muted text-center">{{$survey->title}}</h1></div>
            </div>
            <hr>
            <h2>{{$survey->customer_text}}</h2>
            <form action="{{action('AnswerController@fill')}}" method="POST" >
                <input type="hidden" name="survey_id" value="{{$survey->id}}">
                <div class="row">
                    @csrf
                    <div class="col-5 mt-5">
                        {{App\User::where('id', $agent)->pluck('name')->first()}}
                    </div>
                    <div class="col mt-5">
                        @foreach($questions as $question)
                            <div class="row">

                                <div class="col">
                                    <input type="hidden" name="questions[]" value="{{$question->id}}">
                                    <div class="form-group">
                                        <label for="{{$question->type}}">{{$question->content}} @if($question->required)<sup class="text-danger">*</sup>@endif</label>
                                        @if($question->type != 'longText')
                                        <input name="answer[]"
                                               type="{{$question->type}}"
                                               @if($question->type == 'file')
                                               accept="image/png, image/jpeg"
                                               @endif
                                               @if($question->required) required @endif
                                               class="form-control">
                                        @endif
                                        @if($question->type == 'longText')
                                            <textarea name="answer[]"

                                                   @if($question->required) required @endif
                                                      class="form-control"></textarea>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col"><sup class="text-danger">*</sup> - to pole jest wymagane</div>
                    <div class="col-8"><input type="submit" class="btn btn-xl rounded-0 shadow-lg btn-success" value="Wyślij!"></div>
                </div>

                <div class="row fixed-bottom">
                    <div class="col">
                        <small class=" text-white">
                            Administratorem Twoich danych osobowych jest KUC Partners sp. z o.o. z
                            siedzibą w Tarnowie (33-100) przy ul. Najświętszej Marii Panny 13/2. Szczegółowe niezbędne informacje
                            dotyczące przetwarzania Twoich danych osobowych w
                            związku z realizacją usługi znajdziesz <a href="#">tutaj</a>.

                        </small>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
