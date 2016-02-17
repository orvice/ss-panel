# ss-panel
#
# VERSION 3.0

# auto build from my github project: https://github.com/maxidea-com/ss-panel

FROM daocloud.io/ubuntu:trusty

# make sure the package repository is up to date
RUN apt-get -y update && apt-get install -y redis-server

CMD service redis-server restart

ENTRYPOINT ["echo", ">>>>>>>>ss-panel>>>>>>>"]

EXPOSE 80

# contact
MAINTAINER SimonXu, maxidea@gmail.com
