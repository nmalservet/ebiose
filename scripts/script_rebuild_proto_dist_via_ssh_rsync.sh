#!/bin/bash

####################################################################
# script to deploy the webapp to a distant server via ssh and rsync.
# @author  nicolas malservet
# @version 1.0 
####################################################################

MUSER="root"
MURL="my_server_address.com"
MPATH="/var/www/ebiose/"
MDIR="/data/current_project_dir/ebiose/

echo "delete local cache files"
rm -Rf ./ebiose/assets/*
rm -Rf ./ebiose/photos/*
echo "syncro des sources"
rsync -avz -e 'ssh'  $MDIR $MUSER@$MURL:$MPATH
echo "rebuild db+rights"
ssh $MUSER@$MURL $MPATH"protected/data/script_rebuild_db.sh"
