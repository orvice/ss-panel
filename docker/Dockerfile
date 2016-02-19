# ss-panel
#
# VERSION 3.0

# auto build from my github project: https://github.com/maxidea-com/ss-panel

FROM ubuntu:14.04 

# make sure the package repository is up to date
RUN apt-get -y update && apt-get install -y redis-server
RUN echo "mysql-server-5.6 mysql-server/root_password password pw123456" | sudo debconf-set-selections
RUN echo "mysql-server-5.6 mysql-server/root_password_again password pw123456" | sudo debconf-set-selections
RUN apt-get -y install mysql-server-5.6
RUN apt-get -y install git curl php5 php-guzzle php5-mysql nginx php5-fpm
RUN apt-get install -y python-pip python-m2crypto
RUN pip install cymysql
RUN cd /opt; git clone -b manyuser https://github.com/mengskysama/shadowsocks.git
RUN rm -f /opt/shadowsocks/shadowsocks/Config.py
RUN rm -f /opt/shadowsocks/shadowsocks/config.json
RUN apt-get -y install supervisor
RUN cd /opt; git clone https://github.com/maxidea-com/ss-panel.git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer
RUN cd /opt/ss-panel/; composer install
RUN chmod -R 777 /opt/ss-panel/storage
RUN rm -f /etc/nginx/sites-available/default

ADD Config.py /opt/shadowsocks/shadowsocks/Config.py
ADD config.json /opt/shadowsocks/shadowsocks/config.json
ADD shadowsocks.conf /etc/supervisor/conf.d/shadowsocks.conf
ADD supervisor.conf /etc/supervisor/conf.d/supervisor.conf
ADD 3line.sh /opt/3line.sh
ADD mysql-init.sh /opt/mysql-init.sh
ADD .env /opt/ss-panel/.env
ADD default /etc/nginx/sites-available/default

RUN /bin/bash /opt/3line.sh
RUN service mysql start
RUN /bin/bash /opt/mysql-init.sh

RUN apt-get clean && apt-get autoclean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

EXPOSE 80 1025 1026 1027 1028


CMD ["/usr/bin/supervisord"] 


# contact
MAINTAINER SimonXu, maxidea@gmail.com
