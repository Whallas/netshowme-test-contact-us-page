@component('mail::message')
# {{ __('views.mails.contact_request_created.subject') }}

<p class="sub">{{ __('validation.attributes.message') }}:</p>
@component('mail::panel')
{{ $message }}
@endcomponent

@component('mail::subcopy')
@endcomponent

<p class="sub">{{ __('views.mails.contact_request_created.request_id') . ': ' . $id }}</p>
<p class="sub">{{ __('validation.attributes.phone_number') . ': ' . $phone_number }}</p>
<p class="sub">{{ __('validation.attributes.created_at') . ': ' . $created_at }}</p>

@endcomponent