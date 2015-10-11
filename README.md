# ss-panel

[![Join the chat at https://gitter.im/orvice/ss-panel](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/orvice/ss-panel?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

## About

v3未完成，请查看[v2](https://github.com/orvice/ss-panel/tree/v2)

## Requirements

* PHP 5.5 or newer
* Web server with URL rewriting
* MySQL


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
cp config-sample config
```

Then edit config file under config dir.

### Step 3

Nginx Config example:

if you download ss-panel on path /home/www/ss-panel


```
    root /home/www/ss-panel/public;

    location / {
        try_files $uri $uri/ /index.php$is_args$args;
    }
    
```    
