<?php

return [

  'baseUrl' => 'http://api.prerender.io/recache',

  'token' => env('PRERENDER_TOKEN'),

  'logToFile' => true,

  'logFile' => storage_path('prerender.log'),
];