@component('mail::message')

@component('mail::panel')
**{{ __('Name') }}**: {{ $name }}
@endcomponent

@component('mail::panel')
**{{ __('Email') }}**: {{ $email }}
@endcomponent

@component('mail::panel')
**{{ __('Message') }}**: {{ $message }}
@endcomponent

@endcomponent

