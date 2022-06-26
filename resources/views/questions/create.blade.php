
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <form action="{{action('QuestionController@store')}}" method="POST">
            @csrf
            <input type="hidden" name="survey_id" value="{{request('survey')}}">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="content">{{__('Question content')}}</label>
                        <input type="text" name="content" class="form-control" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="type">{{__('Question type')}}</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="number">{{__('Number')}}</option>
                            <option value="string">{{__('Short text')}}</option>
                            <option value="longText">{{__('Long text')}}</option>
                            <option value="date">{{__('Date')}}</option>
                            <option value="email">{{__('Email')}}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="type">{{__('Answer is required')}}</label>
                        <select name="required" id="type" class="form-control" required>
                            <option value="1">{{__('True')}}</option>
                            <option value="0">{{__('False')}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-success btn-sm" value="{{__('Add question to survey')}}">
        </form>




