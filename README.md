# ss-panel

Let's talk about cat.  Based on [LightFish](https://github.com/Pongtan/LightFish).

[![Build Status](https://travis-ci.org/orvice/ss-panel.svg?branch=master)](https://travis-ci.org/orvice/ss-panel) [![Coverage Status](https://coveralls.io/repos/github/orvice/ss-panel/badge.svg?branch=master)](https://coveralls.io/github/orvice/ss-panel?branch=master) [![Join the chat at https://gitter.im/orvice/ss-panel](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/orvice/ss-panel?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

[Releases](https://plus.google.com/communities/112308980947577664041) |[Follow on Trello](https://trello.com/b/dr62AtYI/ss-panel) | [Google+](https://plus.google.com/communities/112308980947577664041)

## About

Please visit [releases pages](https://github.com/orvice/ss-panel/releases) to download ss-panel.

## Requirements

* PHP 5.6 or newer
* Web server with URL rewriting
* MySQL

## Supported Server

* [shadowsocks manyuser](https://github.com/mengskysama/shadowsocks/tree/manyuser)
* [shadowsocks-go mu](https://github.com/orvice/shadowsocks-go)


## Install

### Step 0

```
git clone https://github.com/orvice/ss-panel.git
```

### Step 1

```
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar  install
```

### Step 2

```
cp .env.example .env
```

then edit .env

```
chmod -R 777 storage
```

### Step 3

Import the sql to you mysql database.

### Step 4

Nginx Config example:

if you download ss-panel on path /home/www/ss-panel


```
root /home/www/ss-panel/public;

location / {
    try_files $uri $uri/ /index.php$is_args$args;
}
    
```

### Step 5 Config

view config guide on [wiki](https://github.com/orvice/ss-panel/wiki/v3-Config)

### 修改地方说明

![image](https://github.com/chuanshuo843/ss-panel/tree/master/public/assets/remark/user_buy_func.png)

