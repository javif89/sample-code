@component('mail::message')

@foreach($announcements as $announcement)
# {{$announcement->type}}

{!! $announcement->body !!}
@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
