@component('mail::message')
# Email: {{$data['email']}}
# Subject: {{$data['subject']}}

message:

{{$data['description']}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
