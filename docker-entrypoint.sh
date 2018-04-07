#!/bin/bash
echo "Entry ss-panel"

echo -n "waiting for MySQL connection..."

while ! nc -w 1 $DB_HOST 3306 > /dev/null 2>&1
do
  echo -n .
  sleep 1
done

echo 'ok'

if [ "$MIGRATION" = "false" ];then
    echo "Skip database migration"
else
    echo "start database migration"
    php xcat migrate
fi


if [ "$ADMIN_EMAIL" != "" ] && [ "$ADMIN_PASS" != "" ];then
  echo "create admin"
  php xcat createAdmin "$ADMIN_EMAIL" "$ADMIN_PASS"
else
  echo "skip create admin"
fi

chmod -R 777 /var/www/html/storage
echo 'Starting Web....'
exec "$@"