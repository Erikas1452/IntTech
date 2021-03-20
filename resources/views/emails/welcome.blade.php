@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

<div>
    Code: {{ $code }}
</div>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
