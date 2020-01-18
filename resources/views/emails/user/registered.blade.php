@component('mail::message')
# Olá {{$user->name}}

Sua conta foi criada.

@component('mail::button', ['url' => ''])
Clique aui para ativar sua conta!

@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
