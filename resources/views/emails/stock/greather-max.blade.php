@component('mail::message')
# Olá

O estoque do {{ $product->name }} está acima do máximo permitido.

Estoque Atual: {{$product->stock}}

Estoque Máximo: {{$product->stock_max}}


Obrigado,<br>
{{ config('app.name') }}
@endcomponent
