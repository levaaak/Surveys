@component('mail::message')
# Hello!

There's a new survey to proceed. Please take a look at it. <br>
Survey's details:
<br>
Survey ID: <b>{{$survey['id']}}</b><br>
Survey title: <b>{{$survey['title']}}</b><br>
Survey Description: <b>{{$survey['description']}}</b>

Thanks,<br>
KUC Ubezpieczenia
@endcomponent
