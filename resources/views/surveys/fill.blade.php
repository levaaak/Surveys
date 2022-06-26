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

</style>
<title>{{$survey->title}}</title>
<div class="container text-center align-items-center">
    <div class="row text-center"><h1 class="text-muted">Wypełnij ankietę!</h1></div>
    <hr>
    <h2>{{$survey->customer_text}}</h2>
    <form action="{{action('AnswerController@fill')}}" method="POST">
        <input type="hidden" name="survey_id" value="{{$survey->id}}">
        <div class="row">


                    @csrf
                    <div class="col mt-5">
                        @foreach($questions as $question)
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="questions[]" value="{{$question->id}}">
                                    <div class="form-group">
                                        <label for="{{$question->type}}">{{$question->content}}</label>
                                        <input name="answer[]"
                                               type="{{$question->type}}"
                                               @if($question->type == 'file')
                                               accept="image/png, image/jpeg"
                                               @endif
                                               @if($question->required) required @endif
                                               class="form-control">

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-8"><input type="submit" class="btn btn-sm btn-success" value="Wyślij!"></div>
                    </div>

        </div>

        <div class="row fixed-bottom">
            <div class="col">
                <small class="text-muted">
                    Administratorem Twoich danych osobowych jest KUC Partners sp. z o.o. z
                    siedzibą w Tarnowie (33-100) przy ul. Najświętszej Marii Panny 13/2. Szczegółowe niezbędne informacje
                    dotyczące przetwarzania Twoich danych osobowych w
                    związku z realizacją usługi znajdziesz <a href="#">tutaj</a>.

                </small>
            </div>
        </div>

    </form>
</div>
