@component('mail::message')
# Introduction

Thanks so much for registering!

@component('mail::button', ['url' => 'https://laracasts.com'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
Change your life today. Don't gamble on the future, act now, without delay.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
