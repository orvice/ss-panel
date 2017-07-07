<?php

use App\Middleware\Admin;
use App\Middleware\Api;
use App\Middleware\Mu;

// Home
$app->group('', function () {
    $this->get('/', 'App\Controllers\HomeController:index');
    $this->get('/code', 'App\Controllers\HomeController:index');
    $this->get('/tos', 'App\Controllers\HomeController:index');
    $this->get('/debug', 'App\Controllers\HomeController:debug');
    $this->post('/debug', 'App\Controllers\HomeController:postDebug');
    $this->get('/500', 'App\Controllers\HomeController:serverError');

    $this->get('/dashboard', 'App\Controllers\HomeController:dashboard');
    $this->get('/nodes', 'App\Controllers\HomeController:dashboard');
    $this->get('/trafficLogs', 'App\Controllers\HomeController:dashboard');
    $this->get('/setting', 'App\Controllers\HomeController:dashboard');
    $this->get('/invite', 'App\Controllers\HomeController:dashboard');
    $this->get('/profile', 'App\Controllers\HomeController:dashboard');
});


// Auth
$app->group('/auth', function () {
    $this->get('/login', 'App\Controllers\HomeController:index');
    $this->get('/register', 'App\Controllers\HomeController:index');
    $this->get('/register/{code}', 'App\Controllers\HomeController:index');
});

// Admin
$app->group('/admin', function () {
    $this->get('', 'App\Controllers\HomeController:admin');
    $this->get('/', 'App\Controllers\HomeController:admin');
    $this->get('/{pages}', 'App\Controllers\HomeController:admin');
    $this->get('/{pages}/{params}', 'App\Controllers\HomeController:admin');
});

// Password
$app->group('/password', function () {
    $this->get('/reset', 'App\Controllers\PasswordController:reset');
    $this->post('/reset', 'App\Controllers\PasswordController:handleReset');
    $this->get('/token/{token}', 'App\Controllers\PasswordController:token');
    $this->post('/token/{token}', 'App\Controllers\PasswordController:handleToken');
});

// Admin
$app->group('/admin2', function () {
    $this->get('', 'App\Controllers\AdminController:index');
    $this->get('/', 'App\Controllers\AdminController:index');

    $this->get('/checkinlog', 'App\Controllers\AdminController:checkinLog');

    // User Mange
    $this->get('/user', 'App\Controllers\Admin\UserController:index');
    $this->get('/user/{id}/edit', 'App\Controllers\Admin\UserController:edit');
    $this->put('/user/{id}', 'App\Controllers\Admin\UserController:update');
    $this->delete('/user/{id}', 'App\Controllers\Admin\UserController:delete');
    $this->get('/user/{id}/delete', 'App\Controllers\Admin\UserController:deleteGet');

    // Test
    $this->get('/test/sendmail', 'App\Controllers\Admin\TestController:sendMail');
    $this->post('/test/sendmail', 'App\Controllers\Admin\TestController:sendMailPost');

    $this->get('/invite', 'App\Controllers\AdminController:invite');
    $this->post('/invite', 'App\Controllers\AdminController:addInvite');
    $this->get('/sys', 'App\Controllers\AdminController:sys');
})->add(new Admin());

// API
$app->group('/api', function () {
    // Auth
    $this->post('/token', 'App\Controllers\Api\TokenController:store');
    $this->post('/createUser', 'App\Controllers\Api\TokenController:createUser');
    $this->get('/token/{token}', 'App\Controllers\Api\TokenController:show');

    // User Resource
    $this->get('/users/{id}/nodes', 'App\Controllers\Api\UserController:nodes')->add(new Api());
    $this->post('/users/{id}/checkIn', 'App\Controllers\Api\UserController:handleCheckIn')->add(new Api());
    $this->get('/users/{id}/trafficLogs', 'App\Controllers\Api\UserController:trafficLogs')->add(new Api());
    $this->get('/users/{id}/', 'App\Controllers\Api\UserController:show')->add(new Api());
    $this->get('/users/{id}', 'App\Controllers\Api\UserController:show')->add(new Api());
    $this->put('/users/{id}', 'App\Controllers\Api\UserController:update')->add(new Api());
    $this->put('/users/{id}/', 'App\Controllers\Api\UserController:update')->add(new Api());
    $this->put('/users/{id}/password', 'App\Controllers\Api\UserController:updatePassword')->add(new Api());
    $this->get('/users/{id}/inviteCodes', 'App\Controllers\Api\UserController:inviteCodes')->add(new Api());
    $this->post('/users/{id}/inviteCodes', 'App\Controllers\Api\UserController:genInviteCodes')->add(new Api());

    $this->get('/config', 'App\Controllers\Api\ConfigController:index');
    $this->get('/config/ss', 'App\Controllers\Api\ConfigController:ss');
    $this->get('/codes', 'App\Controllers\Api\CodeController:index');

    // Admin
    $this->get('/admin/info', 'App\Controllers\Api\Admin\InfoController:index')->add(new Admin());
    $this->get('/admin/config', 'App\Controllers\Api\Admin\ConfigController:index')->add(new Admin());
    $this->put('/admin/config', 'App\Controllers\Api\Admin\ConfigController:update')->add(new Admin());
    $this->get('/admin/nodes', 'App\Controllers\Api\Admin\NodeController:index')->add(new Admin());
    $this->post('/admin/nodes', 'App\Controllers\Api\Admin\NodeController:store')->add(new Admin());
    $this->get('/admin/invites', 'App\Controllers\Api\Admin\InviteController:index')->add(new Admin());
    $this->post('/admin/invites', 'App\Controllers\Api\Admin\InviteController:store')->add(new Admin());
    $this->delete('/admin/invites/{id}', 'App\Controllers\Api\Admin\InviteController:delete')->add(new Admin());
    $this->delete('/admin/nodes/{id}', 'App\Controllers\Api\Admin\NodeController:delete')->add(new Admin());
    $this->get('/admin/trafficLogs', 'App\Controllers\Api\Admin\TrafficLogController:index')->add(new Admin());
});

// mu
$app->group('/mu', function () {
    $this->get('/users', 'App\Controllers\Mu\UserController:index');
    $this->post('/users/{id}/traffic', 'App\Controllers\Mu\UserController:addTraffic');
    $this->post('/nodes/{id}/online_count', 'App\Controllers\Mu\NodeController:onlineUserLog');
    $this->post('/nodes/{id}/info', 'App\Controllers\Mu\NodeController:info');
})->add(new Mu());

// mu
$app->group('/mu/v2', function () {
    $this->get('/users', 'App\Controllers\MuV2\UserController:index');
    $this->post('/users/{id}/traffic', 'App\Controllers\MuV2\UserController:addTraffic');
    $this->post('/nodes/{id}/online_count', 'App\Controllers\MuV2\NodeController:onlineUserLog');
    $this->post('/nodes/{id}/info', 'App\Controllers\MuV2\NodeController:info');
    $this->get('/nodes/{id}/users', 'App\Controllers\MuV2\NodeController:users');
    $this->post('/nodes/{id}/traffic', 'App\Controllers\MuV2\NodeController:postTraffic');
})->add(new Mu());

// res
$app->group('/res', function () {
    $this->get('/captcha/{id}', 'App\Controllers\ResController:captcha');
});
