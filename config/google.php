<?php

return [

    

    'credentials_path' => env('GOOGLE_APPLICATION_CREDENTIALS', storage_path('stroage/app/google-credentials.json')),


    'scopes' => [
        'https://www.googleapis.com/auth/documents',
    ],

  

    'redirect_uri' => env('GOOGLE_REDIRECT_URI', config('app.url') . '/auth/google/callback'),

];
