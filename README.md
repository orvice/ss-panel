# ss-panel

Let's talk about cat.  A simple panel for shadowsocks.

Based on [LightFish](https://github.com/Pongtan/LightFish) and [Vue.js](https://vuejs.org).

[Demo](https://demo.sspanel.xyz/)|[API Document](https://doc.sspanel.xyz/)| [安装文档](https://sspanel.xyz/docs)

[![Build Status](https://travis-ci.org/orvice/ss-panel.svg?branch=master)](https://travis-ci.org/orvice/ss-panel) [![Coverage Status](https://coveralls.io/repos/github/orvice/ss-panel/badge.svg?branch=master)](https://coveralls.io/github/orvice/ss-panel?branch=master) [![Join the chat at https://gitter.im/orvice/ss-panel](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/orvice/ss-panel?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

## About

Please visit [releases pages](https://github.com/orvice/ss-panel/releases) to download source.

## Supported Server

* [shadowsocks manyuser](https://github.com/mengskysama/shadowsocks/tree/manyuser)
* [shadowsocksrss manyuser](https://github.com/breakwa11/shadowsocks/tree/manyuser)
* [shadowsocks-go mu](https://github.com/orvice/shadowsocks-go)
* [shadowsocks-go mu ng](https://github.com/catpie/ss-go-mu)

## Install with Docker

### Get it 
```bash
docker pull orvice/ss-panel
```

### Install with Docker-compose

[Install docker-compose](https://docs.docker.com/compose/install/)

```bash
wget https://raw.githubusercontent.com/orvice/ss-panel/master/docker-compose.yml
docker-compose up -d
```

Visit `ip:8080`



You can also install manual with Nginx or other web server,[check wiki](https://github.com/orvice/ss-panel/wiki/Install-with-Nginx).

## Thanks to
* [LightFish](https://github.com/Pongtan/LightFish)
* [Vue.js](https://vuejs.org)
* [UIKit](https://getuikit.com)
* [UIAdmin](https://github.com/ConsoleTVs/UIAdmin)
* [Now UI Kit](https://github.com/creativetimofficial/now-ui-kit)