<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title><{block name="title"}><{$site_name}><{/block}></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="<{$resources_dir}>/asset/css/LoadingBar.css?<{$version}><{date('Ym')}>" />
        <script>
            paceOptions = {
              elements: true
            };
        </script>
        <script src="<{$resources_dir}>/asset/js/pace.min.js?<{$version}><{date('Ym')}>"></script>
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, user-scalable=no">
        <meta name="robots" content="noindex,nofollow">
        <!-- Favicon -->
        <link rel="icon" href="<{$site_url}>favicon.ico?<{$version}><{date('Ym')}>">
        <meta name="theme-color" content="#4CAEEA">
        <meta name="mobile-web-app-capable" content="yes">
        <!-- <link rel="icon" sizes="192x192" href="chrome-touch-icon-192x192.png"> -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="apple-mobile-web-app-title" content="<{$site_name}>">
        <!-- <link rel="apple-touch-icon" href="apple-touch-icon.png"> -->
        <!-- <meta name="msapplication-TileImage" content="favicon-win.png"> -->
        <meta name="msapplication-TileColor" content="#4CAEEA">
        <meta name="application-name" content="<{$site_name}>">
        <link href="<{$resources_dir}>/asset/css/materialize.min.css?<{$version}><{date('Ym')}>" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<{$resources_dir}>/asset/css/Material_Icons.css?<{$version}><{date('Ym')}>" rel="stylesheet">
        <link href="<{$resources_dir}>/asset/css/main.css?<{$version}><{date('Ym')}>" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body><{block name="contents"}><{/block}>