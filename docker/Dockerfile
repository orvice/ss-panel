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
RUN service mysql start
RUN mysql -u root -p 'pw123456' -e "CREATE DATABASE sspanel character SET utf8; CREATE user 'ssuser'@'localhost' IDENTIFIED BY 'sspasswd'; GRANT ALL privileges ON sspanel.* TO 'ssuser'@'localhost'; FLUSH PRIVILEGES;"
RUN apt-get -y install git curl php5 php-guzzle php5-mysql nginx php5-fpm
RUN apt-get install -y python-pip python-m2crypto
RUN pip install cymysql
RUN cd /opt; git clone -b manyuser https://github.com/mengskysama/shadowsocks.git
RUN cd /opt/shadowsocks/shadowsocks; mysql -u ssuser -psspasswd sspanel < ./shadowsocks.sql


RUN service redis-server start


CMD service redis-server restart



EXPOSE 80

# contact
MAINTAINER SimonXu, maxidea@gmail.com
