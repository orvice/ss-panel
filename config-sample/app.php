<?php

/***
 * config app information
 */

return [
    'key' => "key",  // Key 请修改此值确保安全
    'appName'    => 'ss-panel3',
    'baseUrl' => '/',
    'timeZone' => 'PRC',  // UTC
    'version'  => '3.0.0 Beta',
    'theme'    => 'materialize',
    'authDriver' => 'cookie', // support cookie,file,redis
    'mailDriver' => 'mailgun' // mailgun or smtp
];