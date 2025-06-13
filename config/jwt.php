<?php

return [

    'secret' => env('JWT_SECRET'),
    'ttl' => 60,
    'refresh_ttl' => 20160,
    'algo' => 'HS256',
    'user' => \App\Entities\User::class,
    'identifier' => 'id',
    'required_claims' => ['iss', 'iat', 'exp', 'nbf', 'sub', 'jti'],

];
