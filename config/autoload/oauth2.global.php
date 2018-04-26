<?php

return [
    'zf-oauth2' => [
        'storage' => 'oauth2.doctrineadapter.default',
        'allow_implicit' => true, // default (set to true when you need to support browser-based or mobile apps)
        'access_lifetime' => 3600, // default (set a value in seconds for access tokens lifetime)
        'enforce_state'  => true,  // default
    ],
];