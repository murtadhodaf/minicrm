@component('mail::message')
# Introduction

New Company Has Been Added

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}




<br>Thanks,<br>
{{ config('app.name') }}
@endcomponent
