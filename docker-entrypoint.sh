#!/bin/bash
echo "Entry ss-panel"
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

echo 'Starting Web....'
exec "$@"