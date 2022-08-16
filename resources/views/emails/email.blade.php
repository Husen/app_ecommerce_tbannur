@component('mail::message')
# Introduction

Coba Email

@component('mail::button', ['url' => ''])
Send Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
