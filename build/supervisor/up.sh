#!/bin/bash

#echo "========== Start service Supervisor"
#service supervisor start


#echo "========== Load config of Supervisor"
#supervisorctl reread

#echo "========== Update config Supervisor"
#supervisorctl update

echo "========== Avvio Supervisor in foreground"
exec supervisord -n
