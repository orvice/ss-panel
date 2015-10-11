<?php

/***
 * config app information
 */

return [
    'key' => "key",  // Key 请修改此值确保安全
    'appName'    => 'ss-panel3', //站点名称
    'baseUrl' => '/',     // 站点地址
    'timeZone' => 'PRC',  // UTC
    'pwdType' => 'md5',  // 密码加密，旧版ss-panel请使用md5   可选 md5,sha256
    'sale' => '',     // 密码加密用，从旧版升级请留空
    'theme'    => 'materialize',
    'authDriver' => 'cookie', // support cookie,// @TODO file,redis
    'mailDriver' => 'mailgun' ,// mailgun or smtp
    'version'  => '3.0.0 Beta',
];