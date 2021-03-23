@component('mail::message')
# Introduction

Your account is succesfully created<br>
Please verify your email

@component('mail::button', ['url' => 'http://91.211.247.110/api/verify?email='.$email.'&'.'code='.$code])
Verify
@endcomponent

Thank you for choosin us,<br>
{{ config('app.name') }}
@endcomponent
