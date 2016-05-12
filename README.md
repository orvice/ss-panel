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
 添加了用户使用paypal进行在线支付购买流量功能
 服务器节点,修改为 公共流量节点,独立专线节点 其中公共流量节点注册用户都可以看到,对立专线节点可以关联到付费用户,使其只对改付费用户可见
 又以其中公共节点为自动流程,自动添加用户所购买套餐所对应的流量,但需要管理自己处理废弃订单
 对立专用节点在用户付款后需要管理员手动关联对应的节点服务器,该才可以使用该服务器
 
#### 添加用户购买流量页面
![](https://github.com/chuanshuo843/ss-panel/blob/master/public/assets/remark/user_buy_func.png)
#### 添加用户订单查看功能
![](https://github.com/chuanshuo843/ss-panel/blob/master/public/assets/remark/user_order_log.png)
#### 添加管理员首页订单查看入口
![](https://github.com/chuanshuo843/ss-panel/blob/master/public/assets/remark/admin.png)
#### 节点管理添加节点类型(私人节点,公共节点),
![](https://github.com/chuanshuo843/ss-panel/blob/master/public/assets/remark/user_order_log.png)
#### 添加管理员后台流量套餐管理功能(可自定义流量套餐资费标准)
![](https://github.com/chuanshuo843/ss-panel/blob/master/public/assets/remark/admin_package_manage.png)
#### 添加管理员后台流量套餐管理功能(可自定义流量套餐资费标准)
![](https://github.com/chuanshuo843/ss-panel/blob/master/public/assets/remark/admin_package_manage.png)
#### 添加管理员后台流量套餐购买订单记录查看功能
![](https://github.com/chuanshuo843/ss-panel/blob/master/public/assets/remark/admin_order_log.png)

