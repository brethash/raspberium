#!/bin/bash
if [ -f /var/www/raspberium/.reboot-server ]; then
  rm -f /var/www/raspberium/.reboot-server
if [ -f /var/www/raspberium/.reboot-server ]; then
   echo "Can't remove file .reboot-server"
else
  /sbin/shutdown -r now
fi
fi