#!/bin/bash
MUSER="ebioseuserdb"
MPASS="ebioseuserdb"
MDB="ebiose"

echo "drop db, create and grant user"
mysql -u $MUSER -p$MPASS < ./reconstruct_db.sql
echo "create schema"
mysql -u $MUSER -p$MPASS $MDB < ./create.sql
echo "init db"
mysql -u $MUSER -p$MPASS $MDB < ./init.sql
echo "insert demo db"
mysql -u $MUSER -p$MPASS $MDB < ./demo.sql