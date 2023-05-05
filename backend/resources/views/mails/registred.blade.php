<x-mail::message>
# Olá {{$data['name']}}
## Seja bem vindo a {{ config('app.name') }}

Obrigado por se cadastrar.

<x-mail::button :url="''">
Clique aqui para verificar seu Email
</x-mail::button>

Atenciosamente,<br>
{{ config('app.name') }}
</x-mail::message>
