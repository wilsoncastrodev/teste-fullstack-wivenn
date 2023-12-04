@component('mail::message')
Olá {{ $user->name }},

Agradecemos por se inscrever em nossa plataforma. Enviamos este e-mail para confirmar a criação da sua conta. Para garantir a segurança da sua conta, é necessário realizar a verificação.

Para realizar a verificação, por favor clique no botão abaixo:

@component('mail::button', ['url' => $url])
Verificar E-mail
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
